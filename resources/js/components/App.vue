<template>
    <div class="container ">
        <div class="d-flex mt-3">
            <img v-bind:src="LogoPic">
        </div>
        <div class="row mt-5">
            <Todo />
        </div>
    </div>
</template>

<script setup>
import LogoPic from '../../../resources/images/logo.png'
import Todo from '@/components/Todo.vue';
</script>
