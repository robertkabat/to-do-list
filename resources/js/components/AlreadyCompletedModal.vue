<template>
    <div ref="alreadyCompletedModalElement" class="modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Task Completed</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>This task has already been completed. Nothing to do here :)</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { Modal } from "bootstrap";
import { onMounted, ref } from "vue";

let alreadyCompletedModalElement = ref(null)
let alreadyCompletedModal = null

function _show() {
    alreadyCompletedModal.show();
}

defineExpose({ show: _show });

onMounted(() => {
    alreadyCompletedModal = new Modal(alreadyCompletedModalElement.value);
})
</script>
