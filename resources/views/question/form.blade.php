<div class="space-y-6">
    <div class="question-block relative">
        <x-input-label for="quiz_id" :value="__('Pilih Kuis')" />
        <x-select-input name="quiz_id" :options="$quiz" placeholder="Pilih Kuis" :value="old('quiz_id', $question->id)" required />
        <x-input-error class="mt-2" :messages="$errors->get('quiz_id')" />
    </div>
    <div class="question-container">
        @if ($question->questions)
            @foreach ($question->questions as $item)
                <div class="relative question-item">
                    <x-input-label for="question_text" :value="__('Pertanyaan')" />
                    <x-text-input id="question_text" required name="question_text[]" type="text"
                        class="mt-1 block w-full" :value="old('question_text', $item?->question_text)" autocomplete="question_text"
                        placeholder="Question Text" />
                    <x-input-error class="mt-2" :messages="$errors->get('question_text')" />

                    <x-radio-input required name="answer[{{ $loop->iteration - 1 }}]" index="{{ $loop->iteration - 1 }}"
                        label="Jenis Kelamin" :editable="true" :options="[
                            'option_1' => $item->answers[0]->answer_text ?? '',
                            'option_2' => $item->answers[1]->answer_text ?? '',
                            'option_3' => $item->answers[2]->answer_text ?? '',
                        ]" :selected="old('answer', selectedAnswer($item->answers))" />

                    <span
                        class="absolute top-0 right-0 text-sm cursor-pointer font-bold {{ $loop->iteration - 1 == 0 ? 'text-blue-500' : 'text-red-500 ' }}"
                        onclick="handleClick(this)">{{ $loop->iteration - 1 == 0 ? 'Tambah' : 'Kurang' }}</span>
                </div>
            @endforeach
        @else
            <div class="relative question-item">
                <x-input-label for="question_text" :value="__('Pertanyaan')" />
                <x-text-input id="question_text" required name="question_text[]" type="text"
                    class="mt-1 block w-full" :value="old('question_text', $question?->question_text)" autocomplete="question_text"
                    placeholder="Question Text" />
                <x-input-error class="mt-2" :messages="$errors->get('question_text')" />

                <x-radio-input required name="answer[0]" index="0" label="Jenis Kelamin" :editable="true"
                    :options="[
                        'option_1' => 'Option 1',
                        'option_2' => 'Option 2',
                        'option_3' => 'Option 3',
                    ]" :selected="old('answer')" />

                <span class="absolute top-0 right-0 text-sm text-blue-500 cursor-pointer font-bold"
                    onclick="handleClick(this)">Tambah</span>
            </div>
        @endif
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>Submit</x-primary-button>
    </div>
</div>

@push('customjs')
    <script>
        function handleClick(element) {
            const container = document.querySelector('.question-container');
            const currentElement = element.closest('.question-item');

            if (element.innerText === 'Tambah') {
                // Clone element
                const clone = currentElement.cloneNode(true);
                clone.querySelector('input[type=text]').value = ''
                container.appendChild(clone);

                // clone radio
                const cloneRadio = clone.querySelectorAll('input[type=radio]');
                cloneRadio.forEach((option, index) => {
                    option.setAttribute('index', container.children.length - 1); //
                    option.setAttribute('name', `answer[${container.children.length - 1}]`); //
                })

                const cloneOptions = clone.querySelectorAll('.options')
                cloneOptions.forEach((option, index) => {
                    option.setAttribute('name',
                        `options[${container.children.length-1}][option_${index+1}]`);
                });
                // Update cloned button text and color
                const cloneButton = clone.querySelector('span');
                cloneButton.innerText = 'Kurang';
                cloneButton.classList.remove('text-blue-500');
                cloneButton.classList.add('text-red-500');
            } else if (element.innerText === 'Kurang') {
                // Remove the cloned element
                currentElement.remove();
            }
        }
    </script>
@endpush
