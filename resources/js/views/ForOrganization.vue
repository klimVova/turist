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
                    <div class="rules-org-info">
                        <p>На платформе ТурМедДрайвер представлены компании из 7 отраслей экономики из разных регионов
                            России и других стран: Медицинские центры, Бьюти индустрия, Рестораны/кафе, Отели,
                            Санатории/Курорты, Тур операторы, Спорт. Они размещают информацию о себе на платформе с целью
                            привлечения клиентов и обеспечения эффективности бизнеса, кроме того на платформе можно вести
                            аналитику посещаемости и "портрета клиента" для корректировки маркетинговых стратегий, что
                            улучшит показатели продаж.</p>
                        <p>Порядок сотрудничества с платформой состоит из следующих этапов:</p>
                        <ol>
                            <li>Организация заключает договор с компанией ООО "Центр ЮНИТИ", являющейся официальным
                                представителем экосистемы ТурМедДрайвер и оплачивает услуги по выбранному пакетному
                                предложению.
                            </li>
                            <li>Организация регистрируется на платформе ТурМедДрайвер и получает доступ в личный кабинет, в
                                котором можно разместить информацию о себе, согласно интерфейса.
                            </li>
                            <li>На странице организации указываются преференции, которые организация предоставляет клиентам
                                данной платформы.
                            </li>
                            <li>Организация корректирует информацию в зависимости от необходимости на своей странице.</li>
                            <li>Организация использует консалтинговые услуги данной платформы согласно приобретённого пакета
                                или может докупать необходимые продукты, обеспечивающие ее рост и развитие, в зависимости от
                                необходимости.
                            </li>
                        </ol>
                        <p>Для того, чтобы лучше понять, как регистрировать личный кабинет на платформе и как работать с
                            карточкой организации, можно ознакомиться с инструкциями ниже:</p>
                    </div>
                    <div class="org-type-sort">
                        <ul>
                            <router-link
                                active-class="active"
                                :to="{name:'instruction-medical'}">
                                <li>Медцентры</li>
                            </router-link>
                            <router-link
                                active-class="active"
                                :to="{name:'instruction-spa'}">
                                <li>Спа/бьюти</li>
                            </router-link>
                            <router-link
                                active-class="active"
                                :to="{name:'instruction-cafe'}">
                                <li>Кафе/Рестораны</li>
                            </router-link>
                            <router-link
                                active-class="active"
                                :to="{name:'instruction-hotel'}">
                                <li>Отели</li>
                            </router-link>
                            <router-link
                                active-class="active"
                                :to="{name:'instruction-sanatorium'}">
                                <li>Санатории</li>
                            </router-link>
                            <router-link
                                active-class="active"
                                :to="{name:'instruction-tur'}">
                                <li>Туроператоры</li>
                            </router-link>
                            <router-link
                                active-class="active"
                                :to="{name:'instruction-sport'}">
                                <li>Спортивные базы</li>
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
