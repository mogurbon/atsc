<template>
    <div class="columns">
        <div class="column"></div>
        <div class="column">


            <div class="field">
                <label class="label">Name</label>
                <div class="control">
                    <input class="input" type="text" placeholder="Text input" v-model="aircraft.name">
                </div>
                <label class="label">Size</label>
                <div class="control">

                    <select v-model="aircraft.size_id">
                        <option v-for="option in size" v-bind:value="option.id">
                            {{ option.name }}
                        </option>
                    </select>
                </div>
                <label class="label">Type</label>
                <div class="control">

                    <select v-model="aircraft.type_id">
                        <option v-for="option in type" v-bind:value="option.id">
                            {{ option.name }}
                        </option>
                    </select>
                </div>

            </div>
            <button class="button pull-right is-success m-t-20" @click="save" :disabled="disabledButton">
				<span class="icon">
			      <i class="fa fa-save"></i>
			    </span>
                <span>Save</span>
            </button>

        </div>
        <div class="column">


        </div>

    </div>
</template>

<script>



    export default {
        data(){
            return {
                size: [{
                    'name':'small',
                    'id':1
                },{
                    'name':'large',
                    'id':2
                }],
                type:[{
                    'name':'emergency',
                    'id':1
                },{
                    'name':'vip',
                    'id':2
                },{
                    'name':'passenger',
                    'id':3
                },{
                    'name':'cargo',
                    'id':4
                }],
                aircraft: {
                    size_id: '',
                    type_id: '',
                    name:''

                },
                disabledButton: false,

            }

        },
        mounted () {


        },
        methods:{

            save () {
                return this.axios.post('/aircraft', this.aircraft).then(response => {

                    window.location.href = "/";
                })
            },

        }

    }
</script>

<style scoped>

</style>