import AdminPanel from './components/admin.vue'
import SignUp from './components/SignUp.vue'
import NinoPanel from './components/IngresoNino.vue'
import AdultCreatePanel from './components/CrearAdulto.vue'
import PerfilesPanel from './components/perfiles.vue'
import PerfilTrabajadoresPanel from './components/PerfilTrabajadoresPanel.vue'
import PerfilNinoPanel from './components/perfilnino.vue'
import PerfilResponsablePanel from './components/PerfilResponsable.vue'
import PerfilNinoFInalPanel from './components/PerfilNinoFinal.vue';
import CrearTrabajador from './components/CrearTrabajador.vue';

import{createRouter, createWebHistory} from 'vue-router'

const routes = [
    {
        name: 'AdminPanel',
        component:AdminPanel,
        path:'/AdminPanel'
    },
    {
        name: 'SignUp',
        component:SignUp,
        path:'/' 
    },
    {
        name: 'NinoPanel',
        component:NinoPanel,
        path:'/CrearNino' 
    },
    {
        name: 'CrearTrabajador',
        component:CrearTrabajador,
        path:'/CrearTrabajador' 
    },
    {
        name: 'AdultCreatePanel',
        component:AdultCreatePanel,
        path:'/AdultCreatePanel' 
    }, 
    {
        name: 'PerfilesPanel',
        component:PerfilesPanel,
        path:'/PerfilesPanel' 
    },
    {
        name: 'PerfilTrabajadoresPanel',
        component:PerfilTrabajadoresPanel,
        path:'/PerfilTrabajadoresPanel' 
    },
    {
        name: 'PerfilNinoPanel',
        component:PerfilNinoPanel,
        path:'/PerfilNinoPanel' 
    },
    {
        name: 'PerfilResponsablePanel',
        component:PerfilResponsablePanel,
        path:'/PerfilResponsablePanel' 
    },
    {
        path: '/PerfilNinoFInalPanel/:id', // La ruta acepta un parámetro llamado "id"
        name: 'PerfilNinoFInalPanel',
        component: PerfilNinoFInalPanel
      },

];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;