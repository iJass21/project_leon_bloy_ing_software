<template>
    
    <div class="container">

        <div class="table">
            <div class="table-header">
                <div class="header__item"><a id="name" class="filter__link">Id Alerta</a></div>
                <div class="header__item"><a id="wins" class="filter__link filter__link--number" >Nombre Niño</a></div>
                <div class="header__item"><a id="draws" class="filter__link filter__link--number" >Fecha Alerta</a></div>
                <div class="header__item"><a id="losses" class="filter__link filter__link--number">Descripcion</a></div>
            </div>
            <div class="table-content">
                <div class="table-row">
                    <div class="table-data">Alerta1</div>
                    <div class="table-data">2</div>
                    <div class="table-data">0</div>
                    <div class="table-data">1</div>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
export default {
    // ...
    name: 'VerListaAlertas',

}
</script>

<style>
@import '../assets/css/ListaAlertas.css';
</style>