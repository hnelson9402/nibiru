const config = {};

config.API = "http://apiphp8.test/";

config.token = localStorage.getItem("token");

config.validateToken = () => {
   if (localStorage.getItem("token") === null) {
      document.getElementById('closeSesion').click();
   }
}

export default config;