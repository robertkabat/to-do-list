<template>
    <div class="col-md-3">
        Column
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
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>
                        <div>
                            <FontAwesomeIcon class="icon" icon="fa-regular fa-check-square"/>
                            <FontAwesomeIcon class="icon" icon="fa-regular fa-trash-can"/>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script setup>
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { library } from '@fortawesome/fontawesome-svg-core'
import { faCheckSquare, faTrashCan } from '@fortawesome/free-regular-svg-icons'
library.add(faCheckSquare, faTrashCan)
</script>

<style scoped>
.icon {
    width: 15px;
    height: 15px;
    cursor: pointer;
    gap: 20px;
    margin-right: 10px;
}
</style>
