<template>
  <div class="card mt-5 shadow">
    <div class="card-header bg-white">
      <h4 class="">Audit Logs</h4>
    </div>
    <div class="card-body">
      <table class="table table-hover">
        <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Author</th>
          <th scope="col">Ip Address</th>
          <th scope="col">Action</th>
          <th scope="col">Old Label</th>
          <th scope="col">New Label</th>
          <th scope="col">Date</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="(auditLog,index) in auditLogs">
          <th scope="row">{{ index + 1 }}</th>
          <td>{{ auditLog.user_name ? auditLog.user_name : '-'}}</td>
          <td class="fw-bold">{{ auditLog.ip_address ? auditLog.ip_address : '-'}}</td>
          <td class="text-capitalize">{{ auditLog.action ? auditLog.action : '-'}}</td>
          <td>{{ auditLog.old_label ? auditLog.old_label : '-'}}</td>
          <td>{{ auditLog.new_label ? auditLog.new_label : ''}}</td>
          <td>{{ auditLog.created_at ? auditLog.created_at : ''}}</td>
        </tr>
        </tbody>
      </table>
      <h3 v-if="!auditLogs.length" class="mt-4 text-muted text-center">No Audit Log found...</h3>
    </div>
  </div>
</template>

<script>
import ApiService from "@/services/api.service";

export default {
  name: "AuditLog",
  data() {
    return {
      auditLogs: [],
    }
  },
  created() {
    this.getAuditLogs();
  },
  methods: {
    getAuditLogs() {
      ApiService.get('audit-logs').then(({data}) => {
        this.auditLogs = data;
      }).catch((errors) => {
        console.log('error', errors.response.data.message);
      });
    }
  }
}
</script>
