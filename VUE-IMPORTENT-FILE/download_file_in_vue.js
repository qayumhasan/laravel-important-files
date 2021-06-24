  downloadSoftware(link) {
      axios({
        url: link,
        methods: "GET",
        responseType: "blob",
      })
        .then((res) => {
          const url = window.URL.createObjectURL(new Blob([res.data]));
          const link = document.createElement("a");
          link.href = link;
          link.setAttribute("download", "image.zip");
          document.body.appendChild(link);
          link.click();
          this.$router.push({ name: "home" });
        })
        .catch((error) => {
          
          this.$notify({
            type: "error",
            title: "Not Download! Something Went Wrong",
          });
          this.$router.push({ name: "home" });
        });
    },
