<template>
    <div class="container-fluid main card">
        <div class="row menu-categories">
            <div class="sort col col-12 col-md-2">
                <div id="menu_categories" class="menu-categories-items">
                    <ul>
                        <li>
                            <router-link :to="{name: 'fororganization'}">Для организация</router-link>
                        </li>
                        <li>
                            <router-link :to="{name: 'forclient'}">Для клиентов</router-link>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="card-cafe col col-12 col-md-10 consalt">
                <div class="section-label">
                    <h2>Инструкция для пользователей платформы</h2>
                    <hr>
                </div>

                <div class="consalt-section">
                    <div class="sub-section-label">
                        <label>Организация</label>
                    </div>
                    <div>
                        <ul>
                            <li><img src="assets/img/check-list.svg">Организации, размещающие информацию о себе на
                                платформе ТурМедДрайвер с целью привлечения клиентов и обеспечения эффективности бизнеса
                                - компании из 8 отраслей экономики:
                                <ul>
                                    <li><img src="assets/img/check-list.svg">Санатории/Курорты</li>
                                    <li><img src="assets/img/check-list.svg">Бьюти индустрия</li>
                                    <li><img src="assets/img/check-list.svg">Медицинские центры</li>
                                    <li><img src="assets/img/check-list.svg">Спорт</li>
                                    <li><img src="assets/img/check-list.svg">Фарма</li>
                                    <li><img src="assets/img/check-list.svg">Отели</li>
                                    <li><img src="assets/img/check-list.svg">Рестораны/кафе</li>
                                    <li><img src="assets/img/check-list.svg">Тур операторы</li>
                                </ul>
                                в разных регионах страны и других стран.
                            </li>
                            <li><img src="assets/img/check-list.svg">Организация заключает договор с компанией ООО
                                "Центр ЮНИТИ", являющейся официальным представителем экосистемы ТурМедДрайвер и
                                оплачивает услуги по выбранному пакетному предложению.
                            </li>
                            <li><img src="assets/img/check-list.svg">Организация регистрируется на платформе
                                ТурМедДрайвер и получает доступ в личный кабинет.В личном кабинете организация размещает
                                информацию о себе согласно интерфейса.
                            </li>
                            <li><img src="assets/img/check-list.svg">На странице организации указывается какие
                                преференции организация предоставляет клиентам данной платформы.
                            </li>
                            <li><img src="assets/img/check-list.svg">Может вести аналитику посещаемости и "портрета
                                клиента" для корректировки маркетинговых стратегий, что улучшит показатели продаж.
                            </li>
                            <li><img src="assets/img/check-list.svg">Корректирует информацию в зависимости от
                                необходимости на своей странице.
                            </li>
                            <li><img src="assets/img/check-list.svg">Использует консалтинговые услуги данной платформы
                                согласно приобретённого пакета или может докупать необходимые продукты, обеспечивающие
                                рост и развитие организации, в зависимости от необходимости.
                            </li>
                        </ul>
                    </div>
                    <div class="org-type-sort">
                        <ul>
                            <router-link
                                active-class="active"
                                :to="{name:'instruction-hotel'}">
                                <li>Медицинские центры</li>
                            </router-link>
                            <router-link
                                active-class="active"
                                :to="{name:'instruction-spa'}">
                                <li>Бьюти/SPA</li>
                            </router-link>
                            <router-link
                                active-class="active"
                                :to="{name:'instruction-sanatorium'}">
                                <li>Курорты/Санатории</li>
                            </router-link>
                            <router-link
                                active-class="active"
                                :to="{name:'instruction-cafe'}">
                                <li>Кафе/Рестораны</li>
                            </router-link>
                        </ul>
                    </div>
                    <div>
                        <router-view></router-view>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "ForOrganization"
}
</script>

<style scoped>

</style>
