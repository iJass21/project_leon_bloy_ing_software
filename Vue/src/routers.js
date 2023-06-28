import AdminPanel from './components/admin.vue'
import SignUp from './components/SignUp.vue'
import NinoPanel from './components/IngresoNino.vue'
import AdultCreatePanel from './components/CrearAdulto.vue'
import PerfilesPanel from './components/perfiles.vue'
import PerfilNinoPanel from './components/perfilnino.vue'
import PerfilResponsablePanel from './components/PerfilResponsable.vue'
import PerfilNinoFInalPanel from './components/PerfilNinoFinal.vue';
import FichaNino from './components/FichaNino.vue';
import EditarFicha from './components/EditarFicha.vue';
import CrearTrabajadorPanel from './components/CrearTrabajador.vue';
import PerfilTrabajadoresPanel from './components/PerfilTrabajadores.vue';

//import PerfilResponsable from './components/PerfilResponsable.vue';
import TrabajadorPanel from './components/Trabajador.vue';
import{createRouter, createWebHistory} from 'vue-router';

import editarNino from './components/editarNino.vue';
import CrearFicha from './components/crearFIcha.vue';
import PerfilResponsableFinal from './components/PerfilResponsableFinal.vue'
import PerfilTrabajadoresFinal from './components/PerfilTrabajadorFInal.vue'


const routes = [
    {
        name: 'AdminPanel',
        component: AdminPanel,
        path: '/AdminPanel'

    },
    {
        name: 'SignUp',
        component: SignUp,
        path: '/'
    },
    {
        name: 'NinoPanel',
        component: NinoPanel,
        path: '/CrearNino'
    },
    {
        name: 'AdultCreatePanel',
        component: AdultCreatePanel,
        path: '/AdultCreatePanel'
    },
    {
        name: 'PerfilesPanel',
        component: PerfilesPanel,
        path: '/PerfilesPanel'
    },
    {
        name: 'PerfilNinoPanel',
        component: PerfilNinoPanel,
        path: '/PerfilNinoPanel'
    },
    {
        name: 'PerfilResponsable',
        component: PerfilResponsablePanel,
        path: '/PerfilResponsablePanel'
    },
    {
        path: '/PerfilNinoFInalPanel/:id', // La ruta acepta un parámetro llamado "id"
        name: 'PerfilNinoFInalPanel',
        component: PerfilNinoFInalPanel
    },
    {
        path: '/FichaNino/:id', // La ruta acepta un parámetro llamado "id"
        name: 'FichaNino',
        component: FichaNino
    },
    {
        path: '/EditarFicha/:id', // La ruta acepta un parámetro llamado "id"
        name: 'EditarFicha',
        component: EditarFicha
    },

    {
        path: '/CrearTrabajadorPanel', // La ruta acepta un parámetro llamado "id2
        name: 'CrearTrabajadorPanel',
        component: CrearTrabajadorPanel
    },
    {
        path: '/PerfilResponsableFinal/:id', // La ruta acepta un parámetro llamado "id2
        name: 'PerfilResponsableFinal',
        component: PerfilResponsableFinal
    },
    {
      path: '/TrabajadorPanel', // La ruta acepta un parámetro llamado "id2
      name: 'TrabajadorPanel',
      component: TrabajadorPanel
    },
    {
        path: '/PerfilTrabajadoresPanel', // La ruta acepta un parámetro llamado "id2
        name: 'PerfilTrabajadoresPanel',
        component: PerfilTrabajadoresPanel
    },
    {
        path: '/PerfilTrabajadoresFinal/:id', // La ruta acepta un parámetro llamado "id2
        name: 'PerfilTrabajadoresFinal',
        component: PerfilTrabajadoresFinal
    },
    {
        path: '/editarNino/:id', // La ruta acepta un parámetro llamado "id"
        name: 'editarNino',
        component: editarNino
    },
    {
        path: '/CrearFicha/:rut', // La ruta acepta un parámetro llamado "id"
        name: 'CrearFicha',
        component: CrearFicha
    },


];

//PerfilTrabajadoresPanel

const router = createRouter({
    history: createWebHistory(),
    routes,
});

/*router.beforeEach((to, from, next) => {
    if(to.matched.some(route => route.meta.requiresAuth)){
        if(!store.state.loggedIn){
            next('/')
        }else{
            next();
        }
    }else{
        next()
    }
})
*/
export default router;