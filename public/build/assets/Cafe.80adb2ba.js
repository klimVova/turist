import{g as v}from"./global.fb101c82.js";import{_ as b,r as y,o as l,c,a as s,F as a,b as _,f as k,e as p,j as h,g as m,t as n,d as w,w as x,k as S,p as C,l as L}from"./app.2a8b07f4.js";const V={name:"Cafe",setup(){const{state:e}=v;return{state:e}},data(){return{filterList:[],types:[],districts:[],republics:[],cities:[],cafes:[]}},methods:{getSpa(){this.axios.post("/api/cafes",{}).then(e=>{this.cafes=e.data.data,console.log(e)})},getFilter(){this.axios.post("/api/cafes",{types:this.types,districts:this.districts,republics:this.republics,cities:this.cities}).then(e=>{this.state.city="",this.state.type="",this.state.district="",this.state.republic="",this.cafes=e.data.data})},getFilterList(){this.axios.get("/api/cafes/filters").then(e=>{this.filterList=e.data})},getSearch(){const e=localStorage.getItem("person"),i=JSON.parse(e);this.state.city=i.city,this.state.type=i.type,this.state.district=i.district,this.state.republic=i.republic}},mounted(){this.getSpa(),this.getFilterList(),this.getSearch()}},u=e=>(C("data-v-f82a47e9"),e=e(),L(),e),F={class:"row"},I={class:"sort col col-12 col-md-2"},N=u(()=>s("img",{onclick:"openBlock('sort')",class:"sort-but",src:"src/assets/img/sort.svg"},null,-1)),B={id:"sort",class:"sort-items"},U={class:"sort-item"},D=u(()=>s("span",null,"\u0424\u0435\u0434\u0435\u0440\u0430\u043B\u044C\u043D\u044B\u0439 \u043E\u043A\u0440\u0443\u0433",-1)),M=["for"],j=["id","value"],E={class:"sort-item"},J=u(()=>s("span",null,"\u041E\u0431\u043B\u0430\u0441\u0442\u044C",-1)),O=["for"],R=["id","value"],T={class:"sort-item"},q=u(()=>s("span",null,"\u0413\u043E\u0440\u043E\u0434",-1)),z=["for"],A=["id","value"],G={class:"catalog-list col col-12 col-md-10"},H={class:"list"},K={class:"item fadeInRight wow","data-wow-offset":"0","data-wow-delay":"0.2s","data-wow-duration":"1s"},P={key:0},Q={class:"item-img"},W=["src"],X={class:"list-item-descr"},Y={class:"company"},Z=["src"],$=["href"];function tt(e,i,st,d,o,f){const g=y("router-link");return l(),c("div",null,[s("div",F,[s("div",I,[N,s("div",B,[s("div",U,[D,s("form",null,[(l(!0),c(a,null,_(o.filterList.districts,t=>(l(),c("label",{for:t.id,class:"d-block"},[p(s("input",{id:t.id,type:"checkbox",name:"federal","onUpdate:modelValue":i[0]||(i[0]=r=>o.districts=r),value:t.id},null,8,j),[[h,o.districts]]),m(" "+n(t.title),1)],8,M))),256))])]),s("div",E,[J,s("form",null,[(l(!0),c(a,null,_(o.filterList.republics,t=>(l(),c("label",{for:"republic"+t.id,class:"d-block"},[p(s("input",{id:"republic"+t.id,type:"checkbox",name:"district","onUpdate:modelValue":i[1]||(i[1]=r=>o.republics=r),value:t.id},null,8,R),[[h,o.republics]]),m(" "+n(t.title),1)],8,O))),256))])]),s("div",T,[q,s("form",null,[(l(!0),c(a,null,_(o.filterList.cities,t=>(l(),c("label",{for:"city"+t.id,class:"d-block"},[p(s("input",{id:"city"+t.id,type:"checkbox",name:"city","onUpdate:modelValue":i[2]||(i[2]=r=>o.cities=r),value:t.id},null,8,A),[[h,o.cities]]),m(" "+n(t.title),1)],8,z))),256))])]),s("button",{onClick:i[3]||(i[3]=k(t=>f.getFilter(),["prevent"])),class:"btn",type:"submit"},"\u041D\u0430\u0439\u0442\u0438")])]),s("div",G,[s("div",H,[(l(!0),c(a,null,_(o.cafes,t=>(l(),c("div",K,[d.state.city===t.city_id&&d.state.district===t.district_id&&d.state.republic===t.republic_id||d.state.city===""&&d.state.district===""&&d.state.republic===""||o.cities===t.city_id&&o.districts===t.district_id&&o.republics===t.republic_id?(l(),c("div",P,[w(g,{class:"d-flex",to:"/cafe/"+t.id},{default:x(()=>[s("div",Q,[s("img",{src:t.image_url},null,8,W)]),s("div",X,[s("h2",null,n(t.title),1),s("p",null,n(t.desc),1),s("ul",null,[(l(!0),c(a,null,_(t.tags,r=>(l(),c("li",null,n(r.title),1))),256))]),s("div",Y,[s("img",{class:"logo",src:t.logo_url},null,8,Z),s("a",{href:t.link},[s("p",null,n(t.name_link),1)],8,$)])])]),_:2},1032,["to"])])):S("",!0)]))),256))])])])])}const ot=b(V,[["render",tt],["__scopeId","data-v-f82a47e9"]]);export{ot as default};
