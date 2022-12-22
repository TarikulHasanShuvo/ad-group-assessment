<template>
  <!-- Modal -->
  <div class="modal fade" id="create-or-edit-ip-address-modal" tabindex="-1" aria-labelledby="exampleModalLabel"
       aria-hidden="true">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $parent.editMode ? 'Edit' : 'Add' }} IP Address</h1>
          <button @click="resetForm" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form @submit.prevent="$parent.editMode ? updateIpAddress() :storeIPAddress()">
          <div class="modal-body">
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">IP address</label><br>
              <label v-if="$parent.editMode" for="exampleInputEmail1"
                     class="form-label border rounded px-2 py-1">{{ ipInfo.ip_address }}</label>
              <input v-else type="text" v-model="ipInfo.ip_address" class="form-control" id="exampleInputEmail1"
                     placeholder="xxx.xxx.xxx.xx"
                     required="Please enter valid ip address"
                     pattern="^((25[0-5]|(2[0-4]|1\d|[1-9]|)\d)\.?\b){4}$">
            </div>
            <div class="mb-3">
              <label for="example" class="form-label">Label / Comments</label>
              <input type="text" v-model="ipInfo.label" placeholder="Spare" class="form-control" id="example" required>
            </div>
          </div>
          <div class="modal-footer">
            <button @click="resetForm" type="button" id="close-btn" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn" :class="$parent.editMode ? 'btn-success' : 'btn-primary'">
              {{ $parent.editMode ? 'Update' : 'Save' }}
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import ApiService from "@/services/api.service";

export default {
  name: "CreateOrEditIpAddress",
  data() {
    return {
      ipInfo: {
        id : null,
        ip_address: '',
        label: '',
      }
    }
  },
  methods: {
    storeIPAddress() {
      ApiService.post('ip-address', this.ipInfo).then(() => {
        this.$parent.getIpAddress();
        this.resetForm()
      }).catch((errors) => {
        console.log('error', errors.response.data.message);
      });
    },
    updateIpAddress() {
      ApiService.update(`ip-address/${this.ipInfo.id}`, this.ipInfo).then(() => {
        this.$parent.getIpAddress();
        this.resetForm()
      }).catch((errors) => {
        console.log('error', errors.response.data.message);
      });
    },
    resetForm() {
      this.ipInfo = {
        id: '',
        ip_address: '',
        label: '',
      }
      document.getElementById('close-btn').click()
    }
  }
}
</script>

<style scoped>

</style>