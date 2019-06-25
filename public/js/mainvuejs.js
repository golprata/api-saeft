Vue.http.options.emulateJSON = true;

new Vue({
    el: '#vueApp',
    data: {
        debug: true,
        fname: '',
        lname: '',
        age: '',
        ajaxRequest: false,
        postResults: []
    },
    methods: {
      submitEntry: function() {
        this.ajaxRequest = true;
        this.$http.post('http://localhost:3000/entry', {
              fname: this.fname,
              lname: this.lname,
              age: this.age
            }, function (data, status, request) {
                this.postResults = data;

                this.ajaxRequest = false;
            });
      }}
});
