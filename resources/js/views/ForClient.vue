<template>
    <div class="container-fluid main card">
        <div class="row menu-categories">
            <div class="sort col col-12 col-md-2">
                <div id="menu_categories" class="menu-categories-items">
                    <ul>
                        <li><router-link :to="{name: 'fororganization'}">Для организация</router-link></li>
                        <li><router-link :to="{name: 'forclient'}">Для клиентов</router-link></li>
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
                        <label>Клиенты</label>
                    </div>
                    <p>Клиенты платформы - люди из разных регионов Российской Федерации и других стран, выбирающие для
                        реализации своих потребностей оптимальную компанию в составе экоплатформы ТурМедДрайвер.</p>

                    <div class="instructions">
                        <div class="permanent-instr">
                            <div class="step">
                                <p>Для того, чтобы зарегистрироваться на платформе, нужно нажать кнопку «Личный кабинет» в
                                    правом верхнем углу.</p>
                                <img class="cntr" src="assets/img/g-step1.jpg">
                            </div>
                            <div class="step">
                                <p>Далее нужно нажать кнопку «Зарегистрироваться» в правом верхнем углу</p>
                                <img src="assets/img/g-step2.jpg">
                            </div>
                            <div class="step">
                                <p>и заполнить данные для регистрации.</p>
                                <img src="assets/img/g-step3.jpg">
                            </div>
                        </div>
                        <div class="">
                            <div class="step">
                                <p>Далее нужно войти в личный кабинет. Вход производится также с главной страницы по кнопке
                                    «Личный кабинет».</p>
                                <p>В личном кабинете клиента отражаются поездки, маршруты и история путешествий. Для того,
                                    чтобы сделать заказ, нужно авторизоваться в системе, нажав кнопку
                                    «Регистрация/Авторизация» в правом верхнем углу.</p>
                            </div>

                            <div class="sub-section-label">
                                <label>Раздел «Личные данные»</label>
                            </div>
                            <div class="step">
                                <p>При входе в личный кабинет мы видим страницу личных данных, которые необходимо заполнить
                                    и сохранить. Это делается один раз при регистрации. Потом их можно редактировать.</p>
                                <div class="step-img">
                                    <img class="cntr" src="assets/img/user-step-1-1.png">
                                </div>
                            </div>

                            <div class="sub-section-label">
                                <label>Оформление заказа</label>
                            </div>
                            <div class="step">
                                <p>Для того, чтобы сделать заказ, нужно перейти в каталог, выбрать нужную категорию и
                                    перейти на страницу организации. Затем нажать на кнопку «Заказать услугу».</p>
                                <div class="step-img">
                                    <img class="cntr" src="assets/img/user-step-1-2.png">
                                </div>
                                <div class="step">
                                    <p>В появившемся окне выбрать дату, количество человек и услуги и нажать кнопку
                                        «Добавить».</p>
                                </div>
                            </div>


                            <div class="sub-section-label">
                                <label>Раздел «Корзина»</label>
                            </div>
                            <div class="step">
                                <p>После того, как все услуги заказаны, нужно перейти в личный кабинет в раздел «Корзина».
                                    Там будет виден Ваш заказ, его сумма и комиссия платформе. Чтобы оплатить заказ, нужно
                                    нажать кнопку «Оплатить 10%».</p>
                                <div class="step-img">
                                    <img class="cntr" src="assets/img/user-step-1-3.png">
                                </div>
                                <div class="step">
                                    <p>После этого нужно ввести данные карты, нажать кнопку «Оплатить», затем нажать кнопку
                                        «Success».</p>
                                </div>
                            </div>


                            <div class="sub-section-label">
                                <label>Раздел «Промокоды»</label>
                            </div>
                            <div class="step">
                                <p>После того, как оплата прошла, нужно перейти в личный кабинет в раздел «Промокоды». Там
                                    отображены номер заказа, организация, заказанные услуги, дата заказа и промокод.
                                    Светло-серым цветом отображены услуги, у которых истек срок действия. Это история
                                    покупок. Соответствующий заказу и услуге промокод нужно показать, когда прибудете в
                                    организацию, у которой заказали услуги. </p>
                                <div class="attention">
                                    <img src="assets/img/att.svg">
                                    <p>Платформа берет комиссию 10% от стоимости заказа. Оставшуюся сумму услуги, которая
                                        была заказана, нужно оплатить после прибытия в организацию.</p>
                                </div>
                                <div class="step-img">
                                    <img class="cntr" src="assets/img/user-step-1-4.png">
                                </div>
                                <div class="step">
                                    <p>Промокод приходит и на e-mail.</p>
                                    <div class="step-img">
                                        <img class="cntr" src="assets/img/user-step-1-5.png">
                                    </div>
                                </div>
                            </div>


                            <div class="sub-section-label">
                                <label>Мобильное приложение</label>
                            </div>
                            <div class="step">
                                <p>Кроме веб-версии платформы существует мобильное приложение. Его функционал аналогичен
                                    веб-версии и действия при заказе услуг аналогичны.</p>
                                <div class="step-img mob-prtfl">
                                    <img src="assets/img/user-step-1-mob.png">
                                </div>
                            </div>


                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "ForClient"
}
</script>

<style scoped>
.mob-prtfl img{
    width: 100%;
}
</style>
