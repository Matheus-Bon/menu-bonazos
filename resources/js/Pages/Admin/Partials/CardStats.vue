<script>
import BoxBorder from "../Components/UI/BoxBorder.vue";

export default {
    name: "card-stats",
    props: {
        statSubtitle: {
            type: String,
            default: "Traffic",
        },
        statTitle: {
            type: String,
            default: "350,897",
        },
        statArrow: {
            default: "up",
            validator: function (value) {
                // The value must match one of these strings
                return ["up", "down"].indexOf(value) !== -1;
            },
        },
        statPercent: {
            type: String,
            default: "3.48",
        },
        // can be any of the text color utilities
        // from tailwindcss
        statPercentColor: {
            type: String,
            default: "text-emerald-500",
        },
        statDescripiron: {
            type: String,
            default: "Since last month",
        },
        statIconName: {
            type: String,
            default: "far fa-chart-bar",
        },
        // can be any of the background color utilities
        // from tailwindcss
        statIconColor: {
            type: String,
            default: "bg-red-500",
        },
    },
    components: { BoxBorder },
};
</script>
<template>
    <BoxBorder>
        <div class="flex-auto p-4">
            <div class="flex flex-wrap">
                <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                    <h5
                        class="text-gray-600 dark:text-light-gray uppercase font-normal text-base pb-2"
                    >
                        {{ statSubtitle }}
                    </h5>
                    <span
                        class="font-medium text-2xl text-gray-600 dark:text-light-gray"
                    >
                        {{ statTitle }}
                    </span>
                </div>
                <div class="relative w-auto pl-4 flex-initial">
                    <div
                        class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full"
                        :class="[statIconColor]"
                    >
                        <i :class="[statIconName]"></i>
                    </div>
                </div>
            </div>
            <p class="text-sm text-blueGray-400 mt-4">
                <span class="mr-2" :class="[statPercentColor]">
                    <i
                        :class="[
                            statArrow === 'up'
                                ? `fas fa-arrow-up`
                                : `fas fa-arrow-down`,
                        ]"
                    ></i>
                    {{ statPercent }}%
                </span>
                <span class="whitespace-nowrap text-gray-500 text-sm">{{
                    statDescripiron
                }}</span>
            </p>
        </div>
    </BoxBorder>
</template>
