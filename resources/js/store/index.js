import { createStore } from "vuex";

//Importation des modules gérant les données contenu dans l'entête de page

import togoactualiteModule from './modules/frontoffice/header/togoactualite'

import rubriquesModule from './modules/frontoffice/header/rubriques'

import economieModule from './modules/frontoffice/header/economie'

import diasporaModule from './modules/frontoffice/header/diaspora'

import internationalModule from './modules/frontoffice/header/international'

import sportsModule from './modules/frontoffice/header/sports'

//Importation des modules gérant les données contenu dans le pied de page

import newsletterModule from './modules/frontoffice/footer/newsletter'

import articlesPopularsModule from './modules/frontoffice/footer/articlesPopulars'

import categoryPopularsModule from './modules/frontoffice/footer/categoryPopulars'

import tagsPopularsModule from './modules/frontoffice/footer/tagsPopulars'

//Importation du module gérant les données des publications sur la page d'accueil

import sectionsPublicationsHomePageModule from './modules/frontoffice/sectionsPublicationsHomePage/sectionsPublicationsHomePage'


//Importation du module gérant les données de création de matricule pour visiteurs

import visitorsActionsViewsModule from './modules/frontoffice/visitors_actions/visitors_actions_views'

import visitorsActionsLikesModule from './modules/frontoffice/visitors_actions/visitors_actions_likes'

import visitorsActionsCommentsModule from './modules/frontoffice/visitors_actions/visitors_actions_comments'

//Importation du module gérant les données d'envoi de messages

import contactModule from "./modules/frontoffice/home_page/contact"

//Importation du module gérant les données des publications sur la page d'accueil

import homePageModule from './modules/frontoffice/home_page/home_page'

//Importation du module gérant les données sur article

import articleModule from './modules/frontoffice/article/article'

//Importation du module gérant le changement des status des publications

import changeProgramModule from "./modules/frontoffice/home_page/changeProgram"

//Le fonctionnalités pour l'authentification

import loginModule from './modules/auth/login';

import meProfileModule from './modules/auth/meProfile';

import logoutModule from './modules/auth/logout';

import registerModule from './modules/auth/register';

import forgot_passwordModule from './modules/auth/forgot_password';

//Sécurité pour les pages d'administration

import roleModule from './modules/backoffice/role'

const store = createStore({
    modules:{

        //Déclaration des modules gérant les données contenu dans l'entête de page

        togoactualite: togoactualiteModule,
        rubriques: rubriquesModule,
        economie: economieModule,
        diaspora: diasporaModule,
        international: internationalModule,
        sports: sportsModule,

        //Déclaration des modules gérant les données contenu dans le pied de page

        newsletter: newsletterModule,
        articlesPopulars: articlesPopularsModule,
        categoryPopulars: categoryPopularsModule,
        tagsPopulars: tagsPopularsModule,

        //Déclaration du module gérant les données des publications sur la page d'accueil

        sectionsPublicationsHomePage: sectionsPublicationsHomePageModule,

        //Déclaration du module gérant les données de création de matricule pour visiteurs

        visitorsActionsViews: visitorsActionsViewsModule,
        visitorsActionsLikes: visitorsActionsLikesModule,
        visitorsActionsComments: visitorsActionsCommentsModule,

        //Déclaration du module gérant les données d'envoi des messages

        contact: contactModule,

        //Déclaration du module gérant les données des publications sur la page d'accueil

        homePage: homePageModule,

        //Déclaration du module gérant les données sur un article

        article: articleModule,

        //Déclaration du module gérant le statut des publication

        changeProgram: changeProgramModule,

        //Déclaration des modules gérant les données du système d'authenitification

        login: loginModule,
        logout:logoutModule,
        meProfile: meProfileModule,
        forgot_password: forgot_passwordModule,
        register: registerModule,

        //Déclaration des modules gérant les données du système de la securité su site

        roleSecurity: roleModule,
    }
  });

  export default store;
