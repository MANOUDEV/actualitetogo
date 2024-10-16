import { createRouter, createWebHistory } from 'vue-router';

//Importation du composant du tableau de bord de l'administrateur

import DashboardAdmin from '../components/backoffice/administrateur/pages/DashboardComponent.vue';

//Importation du composant du tableau de bord de l'administrateur

import ProfileAdmin from '../components/backoffice/administrateur/pages/profile/ProfileComponent.vue';
 
const routes =[

  //Routes pour les fonctionnalités de l'interface de l'administrateur

    //Tableau de bord

    {path:'/admin/dashboard',component: DashboardAdmin, name: 'admin.dashboard' ,meta: { requiredAuth: true }},

    //Gestion du profil

    {path:'/admin/profile',component: ProfileAdmin, name: 'admin.profile' ,meta: { requiredAuth: true }},
     
];

export const routeConfig = createRouter({
  history: createWebHistory(),
  routes: routes
});
