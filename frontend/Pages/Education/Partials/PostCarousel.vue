<script setup>
import { Card, CardContent } from '@/components/ui/card'
import { Carousel, CarouselContent, CarouselItem, CarouselNext, CarouselPrevious } from '@/components/ui/carousel'
</script>

<template>
    <Carousel v-slot="{ canScrollNext, canScrollPrev }" class="relative w-full max-w-xs">
        <CarouselContent>
            <CarouselItem v-for="(_, index) in 5" :key="index">
                <Card>
                    <CardContent class="flex aspect-square items-center justify-center overflow-hidden p-2">
                        <img src="https://picsum.photos/200/300/?blur=2" alt="Caraousel"
                            class="w-full h-full object-cover rounded-xl">
                    </CardContent>
                </Card>
            </CarouselItem>
        </CarouselContent>
        <CarouselPrevious v-if="canScrollPrev" />
        <CarouselNext v-if="canScrollNext" />
    </Carousel>
</template>
