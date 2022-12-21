<template>
<!--  <div class="d-flex justify-content-center pt-5">-->
<!--    <div class="">-->
<!--      <h1 class="text-muted">Welcome to Our App. </h1>-->
<!--      <div class="d-flex justify-content-center">-->
<!--        <h6 class="text-muted">Please Login to Continue</h6>-->
<!--        <router-link to="/home" class="text-primary ms-2"> <h6>Products</h6></router-link>-->
<!--      </div>-->
<!--    </div>-->
<!--  </div>-->
  <div id="map"></div>
  <ProductsGallery/>
</template>

<script>
import JwtService from "@/services/jwt.service";
import ProductsGallery from "@/views/auth/components/ProductsGallery";
import axios from "axios";
import login from "@/views/auth/pages/Login";

export default {
  name: "Home",
  components: {ProductsGallery},
  mounted() {

    axios.defaults.baseURL = "";
    axios.get('https://maps.googleapis.com/maps/api/place/queryautocomplete/json?input=pizza%20near%20par&key=AIzaSyDIKDiD0oVMYlTNSUtv3NRwOKPQfWW3ULk')
        .then(res=>console.log(res))
        if (JwtService.getToken()) {
      this.$router.push({name: "Products"});
    }
  }
}
</script>

<style scoped>

</style>
