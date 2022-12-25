<template>
  <div class="card mt-5 shadow">
    <div class="card-header d-flex justify-content-between">
      <h4 class="">IP Address List</h4>
      <button @click="editMode = false" class="btn btn-primary" data-bs-toggle="modal"
              data-bs-target="#create-or-edit-ip-address-modal">+ ADD
        IP
      </button>
    </div>
    <div class="card-body">
      <table class="table table-striped table-hover">
        <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Ip Address</th>
          <th scope="col">Label / Comment</th>
          <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="(ipAddress,index) in ipAddresses">
          <th scope="row">{{ index + 1 }}</th>
          <td>{{ ipAddress.ip_address ? ipAddress.ip_address : '' }}</td>
          <td>{{ ipAddress.label ? ipAddress.label : '' }}</td>
          <td>
            <button @click="editIpAddress(ipAddress)" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                    data-bs-target="#create-or-edit-ip-address-modal">Edit
            </button>
          </td>
        </tr>
        </tbody>
      </table>
      <h3 v-if="!ipAddresses.length" class="mt-4 text-muted text-center">No IP Address found...</h3>
    </div>
    <CreateOrEditIpAddress ref="createOrEditIpAddress"/>
  </div>
</template>

<script>
import CreateOrEditIpAddress from "@/views/protected/pages/dashboard/components/CreateOrEditIpAddress";
import ApiService from "@/services/api.service";

export default {
  name: "Dashboard",
  components: {CreateOrEditIpAddress},
  data() {
    return {
      editMode: false,
      ipAddresses: []
    }
  },
  mounted() {
    this.getIpAddress();
  },
  methods: {
    getIpAddress() {
      ApiService.get('ip-address').then(({data}) => {
        this.ipAddresses = data;
      }).catch(e => console.log(e))
    },
    editIpAddress(ipAddress) {
      this.$refs.createOrEditIpAddress.ipInfo = {
        id: ipAddress.id,
        ip_address: ipAddress.ip_address,
        label: ipAddress.label,
      };

      this.editMode = true
    }
  }
}
</script>

<style scoped>

</style>