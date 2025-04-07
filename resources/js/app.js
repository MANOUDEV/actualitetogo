import './bootstrap';

//Importation des librairies js

import { createApp } from 'vue'

import VueSweetalert2 from 'vue-sweetalert2';

import 'sweetalert2/dist/sweetalert2.min.css';

import store from './store/index';

//Importation, déclaration et chargement des composants inclus dans le header

import TogoactualiteHeader from './components/frontoffice/header/togoactualite.vue'

import RubriquesHeader from './components/frontoffice/header/rubriques.vue'

import EconomieHeader from './components/frontoffice/header/economie.vue'

import DiasporaHeader from './components/frontoffice/header/diaspora.vue'

import InternationalHeader from './components/frontoffice/header/international.vue'

import SportsHeader from './components/frontoffice/header/sports.vue'

//Importation, déclaration et chargement des composants inclus dans le footer

import NewsletterFooter from './components/frontoffice/footer/newsletter.vue'

import ArticlesPopularsFooter from './components/frontoffice/footer/articlesPopulars.vue'

import CategoryPopularsFooter from './components/frontoffice/footer/categoryPopulars.vue'

import TagsPopularsFooter from './components/frontoffice/footer/tagsPopulars.vue' 

//Importation, déclaration et chargement des composants des sections de publications inclus dans la page d'accueil

import togoPolitiqueComponent from './components/frontoffice/sectionsPublicationsHomePage/togoPolitiqueComponent.vue'

import aNePasManquerTogoComponent from './components/frontoffice/sectionsPublicationsHomePage/aNePasManquerTogoComponent.vue'

const app = createApp({})

app.component('TogoactualiteHeader', TogoactualiteHeader)

app.component('RubriquesHeader', RubriquesHeader)

app.component('EconomieHeader', EconomieHeader)

app.component('DiasporaHeader', DiasporaHeader)

app.component('InternationalHeader', InternationalHeader)

app.component('SportsHeader', SportsHeader)

app.component('Newsletter', NewsletterFooter)

app.component('ArticlesPopulars', ArticlesPopularsFooter)

app.component('CategoryPopulars', CategoryPopularsFooter)

app.component('TagsPopulars', TagsPopularsFooter)

app.component('togoPolitique', togoPolitiqueComponent)

app.component('aNePasManquerTogo', aNePasManquerTogoComponent)

app.use(VueSweetalert2).use(store).mount('#app')
