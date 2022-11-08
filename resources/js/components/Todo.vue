<template>
    <div class="col-md-3">
        Column
        {{ tasks }}
    </div>
    <div class="col-md-9">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Task</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
                <tr v-for="(task, index) in tasks" :key="task.id">
                    <th scope="row">{{ index + 1 }}</th>
                    <td>{{ task.content }}</td>
                    <td>
                        <div>
                            <FontAwesomeIcon
                                @click="markAsCompleted(task)"
                                icon="fa-regular fa-check-square"
                                :class="{'completed-task': task.completed_at}"
                                class="icon"
                            />
                            <FontAwesomeIcon @click="markAsDeleted(task.id)" class="icon" icon="fa-regular fa-trash-can"/>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <AlreadyCompletedModal ref="alreadyCompletedModal" />
</template>

<script setup>
import { onMounted, ref } from "vue";

import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { library } from '@fortawesome/fontawesome-svg-core'
import { faCheckSquare, faTrashCan } from '@fortawesome/free-regular-svg-icons'

library.add(faCheckSquare, faTrashCan)

import AlreadyCompletedModal from '@/components/AlreadyCompletedModal.vue';

let tasks = ref(null)
let alreadyCompletedModal = ref(null)

const getTasks = () => axios.get('/api/tasks').then(response => tasks.value = response.data.data)
const markAsDeleted = id => axios.delete(`/api/tasks/${id}`).then(() => getTasks())
const markAsCompleted = task => {
    if (task.completed_at) {
        alreadyCompletedModal.value.show()
    } else {
        axios.put(`/api/tasks/${task.id}`, { completed: true }).then(() => getTasks())
    }
}

onMounted(() => getTasks());
</script>

<style scoped>
.icon {
    width: 17px;
    height: 17px;
    cursor: pointer;
    gap: 20px;
    margin-right: 10px;
}

.completed-task {
    color: darkgreen;
}
</style>
