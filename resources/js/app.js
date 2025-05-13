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
 
//Verifier les connexions pour configurer les menus

import in_second_menuF from './components/frontoffice/verify_auth/in_second_menu.vue'
 
import off_canvasF from './components/frontoffice/verify_auth/off_canvas.vue'

import in_first_menuF from './components/frontoffice/verify_auth/in_first_menu.vue'
 
//Importation des composants pour l'authentification

import loginH from './components/authentication/login.vue'

import socialGoogleLoginComponent from './components/authentication/social_login/google-authentication.vue'

//Importation du Composant de contact à afficher sur la page d'accueil

import contactF from './components/frontoffice/includes/contact.vue'

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
 
app.component('inSecondMenu', in_second_menuF)
 
app.component('offCanvas', off_canvasF)

app.component('inFirstMenu', in_first_menuF)

app.component('login', loginH)

app.component('contact', contactF)

app.use(VueSweetalert2).use(store).mount('#app')
