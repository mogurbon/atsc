<template>
    <div class="columns">

        <div class="column">
            <h5 class="title is-5">Aircraft</h5>
            <draggable class="" tag="ul" v-model="list" v-bind="dragOptions" :move="onMove" @start="isDragging=true" @end="isDragging=false">
                <transition-group type="transition" class="is-outlined" :name="'flip-list'">
                    <li class="is-primary" v-for="element in list" :key="element.id">
                        <i class="glyphicon glyphicon-pushpin" @click=" element.fixed=! element.fixed" aria-hidden="true"></i>
                        {{element.name}}

                    </li>
                </transition-group>
            </draggable>

        </div>

        <div class="column border-danger">
            <h5 class="title is-5">Queue</h5>
            <draggable element="span" v-model="list2" v-bind="dragOptions" :move="onMove">
                <transition-group name="no" class="" tag="ul">
                    <li class="" v-for="element in list2" :key="element.id">
                        <i class="glyphicon glyphicon-pushpin" @click=" element.fixed=! element.fixed" aria-hidden="true"></i>
                        {{element.name}}
                        <span class="badge">{{element.order}}</span>
                    </li>
                </transition-group>
            </draggable>


        </div>
        <div class="column">
            <button class="button pull-left is-success m-t-20"  @click="save">
				<span class="icon">
			      <i class="fa fa-save"></i>
			    </span>
                <span>Save</span>
            </button>
        <!--<pre>{{listString}}</pre>-->
        </div>


        <br/>

    </div>
</template>

<script>


    import draggable from "vuedraggable";
    const message = [
        "vue.draggable",
        "draggable",
        "component",
        "for",
        "vue.js 2.0",
        "based",
        "on",
        "Sortablejs"
    ];

    export default  {
        data(){
            return {

               /* list: message.map((name, index) => {
                    return { name, order: index + 1, fixed: false };
                }),*/

                list2: [],
                editable: true,
                isDragging: false,
                delayedDragging: false,


                events: [],
                list:[

                ]

            }

        },
        mounted () {
            this.getaircrafts()

        },
        methods:{
            getaircrafts(){
                let url = '/aircrafts/';
                this.axios.get(url)
                    .then(res => {


                        for (var i = res.data.length - 1; i >= 0; i--) {
                            let aircraft = {}
                            let data = res.data[i]
                            aircraft.id = data.id
                            aircraft.name = data.name
                            aircraft.type_id = data.type_id
                            aircraft.size_id = data.size_id

                            this.list.push(aircraft)
                        }
                    })
            },

            orderList() {
                this.list = this.list.sort((one, two) => {
                    return one.order - two.order;
                });
            },
            onMove({ relatedContext, draggedContext }) {
                const relatedElement = relatedContext.element;
                const draggedElement = draggedContext.element;
                return (
                    (!relatedElement || !relatedElement.fixed) && !draggedElement.fixed
                );
            },
            save(){
                return this.axios.post('/savequeue', {'queue':this.list2}).then(res => {
                    let listord=[];
                    for (var i = res.data.length - 1; i >= 0; i--) {
                        let aircraft = {}
                        let data = res.data[i]
                        aircraft.id = data.id
                        aircraft.name = data.name
                        aircraft.type_id = data.type_id
                        aircraft.size_id = data.size_id

                        listord.push(aircraft)
                    }
                    this.list2 = listord;

                    let myToast = this.$toasted.show('saved');

                    myToast.goAway(1500);
                })
            }


        },
        computed:{
            dragOptions() {
                return {
                    animation: 0,
                    group: "description",
                    disabled: !this.editable,
                    ghostClass: "ghost"
                };
            },
            listString() {
                return JSON.stringify(this.list, null, 2);
            },
            list2String() {
                return JSON.stringify(this.list2, null, 2);
            }
        }


    }
</script>

<style scoped>



</style>