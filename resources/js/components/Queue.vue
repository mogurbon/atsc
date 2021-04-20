<template>
    <div class="columns">

        <div class="column">

            <draggable class="" tag="ul" v-model="list" v-bind="dragOptions" :move="onMove" @start="isDragging=true" @end="isDragging=false">
                <transition-group type="transition" class="is-outlined" :name="'flip-list'">
                    <li class="is-primary" v-for="element in list" :key="element.order">
                        <i class="glyphicon glyphicon-pushpin" @click=" element.fixed=! element.fixed" aria-hidden="true"></i>
                        {{element.name}}

                    </li>
                </transition-group>
            </draggable>

        </div>

        <div class="column border-danger">
            <draggable element="span" v-model="list2" v-bind="dragOptions" :move="onMove">
                <transition-group name="no" class="" tag="ul">
                    <li class="" v-for="element in list2" :key="element.order">
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
                <span>Guardar</span>
            </button>
        <!--<pre>{{listString}}</pre>-->
        </div>

       <!-- <div class="column">
            <pre>{{list2String}}</pre>
        </div>-->
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
                    {'order':1, 'name':'aircracft1', 'type':'cargo', 'size':'large'},
                    {'order':2,'name':'aircracft2', 'type':'emergency', 'size':'large'},
                    {'order':3,'name':'aircracft3', 'type':'passenger', 'size':'small'},
                    {'order':4,'name':'aircracft3', 'type':'passenger', 'size':'large'},
                    {'order':5,'name':'aircracft3', 'type':'passenger', 'size':'small'}
                ]

            }

        },
        mounted () {


        },
        methods:{

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
                return this.axios.post('/savequeue', {'queue':this.list2}).then(response => {


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