<template>
    <!-- Header -->
    <div class="relative md:pt-32 pb-32 pt-12 bg-admin-body-light dark:bg-admin-body">
        <div class="px-4 md:px-10 mx-auto w-full">
            <div>
                <!-- Card stats -->
                <div class="flex flex-wrap">
                    <div class="w-full lg:w-6/12 xl:w-3/12 px-4">
                        <card-stats
                            statSubtitle="Pedidos"
                            statTitle="350,897"
                            statArrow="up"
                            statPercent="3.48"
                            statPercentColor="text-emerald-500"
                            statDescripiron="Since last month"
                            statIconName="bx bxs-notepad"
                            statIconColor="bg-red-500"
                        />
                    </div>
                    <div class="w-full lg:w-6/12 xl:w-3/12 px-4">
                        <card-stats
                            statSubtitle="Pedidos em preparo"
                            statTitle="2,356"
                            statArrow="down"
                            statPercent="3.48"
                            statPercentColor="text-red-500"
                            statDescripiron="Since last week"
                            statIconName="fa-solid fa-fire-burner"
                            statIconColor="bg-orange-500"
                        />
                    </div>
                    <div class="w-full lg:w-6/12 xl:w-3/12 px-4">
                        <card-stats
                            statSubtitle="Pedidos em entrega"
                            statTitle="924"
                            statArrow="down"
                            statPercent="1.10"
                            statPercentColor="text-orange-500"
                            statDescripiron="Since yesterday"
                            statIconName="fa-solid fa-truck"
                            statIconColor="bg-pink-500"
                        />
                    </div>
                    <div class="w-full lg:w-6/12 xl:w-3/12 px-4">
                        <card-stats
                            statSubtitle="Pedidos Concluídos"
                            statTitle="49,65%"
                            statArrow="up"
                            statPercent="12"
                            statPercentColor="text-emerald-500"
                            statDescripiron="Since last month"
                            statIconName="fa-solid fa-check"
                            statIconColor="bg-emerald-500"
                        />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import CardStats from "@/Pages/Admin/Partials/CardStats.vue";

export default {
    components: {
        CardStats,
    },
};
</script>
