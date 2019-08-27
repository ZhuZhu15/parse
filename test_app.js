var demo = new Vue({
    el: '#demo',
    data: {
      sortKey: "",
      sortOrders: {"name":1, "power":1},
      heroes: [
        { name: 'Chuck Norris', power: Infinity },
        { name: 'Bruce Lee', power: 9000 },
        { name: 'Jackie Chan', power: 7000 },
        { name: 'Jet Li', power: 8000 }
      ]
    },
    computed: {
        filter_heroes: function () {
            var that_vue = this
            var heroes = that_vue.heroes
            if (that_vue.sortKey) {
              heroes = heroes.slice().sort(function (a, b) {
                a = a[that_vue.sortKey]
                b = b[that_vue.sortKey]
                return (a === b ? 0 : a > b ? 1 : -1) * that_vue.sortOrders[that_vue.sortKey]
              })
            }
            return heroes
          },
    },
    methods: {
        sortBy: function (key) {
          this.sortKey = key
          this.sortOrders[key] = this.sortOrders[key] * -1
        }
      },
  })