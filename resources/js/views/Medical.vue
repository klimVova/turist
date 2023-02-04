<template>
  <div>
    <div class="row"> <!-- блок, который переключается (боковой фильтр + посты) -->
      <div class="sort col col-12 col-md-2">
        <img onclick="openBlock('sort')" class="sort-but" src="src/assets/img/sort.svg">
        <div id="sort" class="sort-items">
          <div class="sort-item">
            <span>Страна</span>
            <form>
              <label :for="district.id" class="d-block" v-for="district in filterList.districts">
                <input :id="district.id" type="checkbox" name="federal" v-model="districts" :value="district.id">
                {{ district.title }}
              </label>
            </form>
          </div>
          <div class="sort-item">
            <span>Регион (область)</span>
            <form>
              <label :for=" `republic` + republic.id" class="d-block" v-for="republic in filterList.republics">
                <input :id=" `republic` + republic.id" type="checkbox" name="district" v-model="republics"
                       :value="republic.id">
                {{ republic.title }}
              </label>
            </form>
          </div>
          <div class="sort-item">
            <span>Город</span>
            <form>
              <label :for="`city` + city.id" class="d-block" v-for="city in filterList.cities">
                <input :id="`city` + city.id" type="checkbox" name="city" v-model="cities" :value="city.id">
                {{ city.title }}
              </label>
            </form>
          </div>
          <button @click.prevent="getFilter()" class="btn" type="submit">Найти</button>
        </div>
      </div>
      <div class="catalog-list col col-12 col-md-10">
        <div class="list">
          <div v-for="medical in medicals" class="item fadeInRight wow " data-wow-offset='0'
               data-wow-delay='0.2s'
               data-wow-duration='1s'
          >
            <div v-if="
             state.city === medical.city_id
             && state.district === medical.district_id
             && state.republic === medical.republic_id
             || state.city === '' && state.district === ''  && state.republic === ''
             || cities === medical.city_id && districts === medical.district_id && republics === medical.republic_id
              ">
              <router-link class="d-flex" :to="'/medical/'+ medical.id">
                <div class="item-img">
                  <img :src="medical.image_url">
                </div>
                <div class="list-item-descr">
                  <h2>{{ medical.title }}</h2>
                  <p>{{ medical.desc }}</p>
                  <ul>
                    <li v-for="tag in medical.tags">{{ tag.title }}</li>
                  </ul>
                  <div class="company">
                    <img class="logo" :src="medical.logo_url">
                    <a :href="medical.link"><p>{{ medical.name_link }}</p></a>
                  </div>
                </div>
              </router-link>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import global from "../global.js";

export default {

  name: "Medical",
  setup() {
    const {state} = global;
    return {state};
  },
  data() {
    return {
      visible: true,
      filterList: [],
      types: [],
      districts: [],
      republics: [],
      cities: [],
      medicals: [],
    }
  },
  methods: {
    getToken() {
      this.token = localStorage.getItem('types')
    },
    getMedical() {
      this.axios.post('/api/medicals', {})
          .then(res => {
            this.medicals = res.data.data
          })
    },
    getFilter() {
      this.axios.post('/api/medicals', {
        'types': this.types,
        'districts': this.districts,
        'republics': this.republics,
        'cities': this.cities,
      })
          .then(res => {
            this.state.city = ''
            this.state.type = ''
            this.state.district = ''
            this.state.republic = ''
            this.medicals = res.data.data
          })
    },
    getFilterList() {
      this.axios.get('/api/medicals/filters',)
          .then(res => {
            this.filterList = res.data
          })
    },
    getSearch() {
      const raw = localStorage.getItem('person')
      const person = JSON.parse(raw)
      this.state.city = person.city
      this.state.type = person.type
      this.state.district = person.district
      this.state.republic = person.republic
    },
  },
  mounted() {
    this.getMedical()
    this.getFilterList()
    this.getSearch()
  }
}
</script>

<style scoped>
.sort button {
  /*width: 175px;*/
  width: 70%;
  margin-top: 8px;
  background-color: #51D3B7;
  color: white;
  padding: 14px 24px;
  border: none;
  -webkit-box-shadow: 0 1px 5px rgba(81, 211, 183, 0.25);
  box-shadow: 0 1px 5px rgba(81, 211, 183, 0.25);
}

.sort button:hover {
  background-color: #69EED1;
}

.sort button:active {
  background-color: #46B9A0;
}

.logo {
  width: 25px;
  height: 25px;
}
</style>