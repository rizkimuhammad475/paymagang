<template>
    <div>
        <div class="col-md-12">
            <div class="form-panel col-md-12">
                      <h4 class="mb"><i class="fa fa-angle-right"></i> Search Student</h4>
                            <form class="form-horizontal">
                              <div class="form-group">
                                <div class="col-md-4" style="margin: 5px 0px;">
                                  <!-- <select class="form-control" v-model="selected">                                  
                                            <option v-for="g in grade">{{g.step}} - {{g.division_name}}</option>
                                  </select> -->
                                  <select v-model="selected" class="form-control" v-on:click="fetchDataStudent()">
                                      <option v-for="option in grade" v-bind:value="option.id">
                                        {{ option.step }} {{ option.division_name }}
                                      </option>
                                    </select>
                                </div>
                                <div class="col-md-3" style="margin: 5px 0px;">
                                  <input type="search" class="form-control" placeholder="Search" v-on:keyup="fetchDataStudent()" v-model="search">
                                </div>
                                <div class="col-md-3" style="margin: 5px 0px;">
                                    <select v-model="inpart" class="form-control" v-on:click="fetchDataStudent()">
                                      <option v-for="part in parts" v-bind:value="part.value">{{part.text}}</option>
                                    </select>
                                </div>
                                <div class="col-md-2" style="margin: 5px 0px;">
                                    <a :href="pdf+selected+dummy+inpart" class="bt btn-success form-control" style="text-align: center;">To PDF</a>
                                </div>
                              </div>           
                          </form>
        </div><!-- /content-panel -->
        </div>
        <div class="col-md-12">
            <div class="form-panel col-md-12">
            <div class="col-md-12" style="padding: 0px;">
                <div class="cf col-md-12" style="padding: 0px;">
                    <div>
                        <div v-if="inpart == 2" class="hidden-phone text-center col-md-1" style="padding: 5px;background-color: #ffd777;">Pay</div>
                        <div class="hidden-phone text-center col-md-2" style="padding: 5px;background-color: #ffd777;">NIS</div>
                        <div v-if="inpart == 2" class="hidden-phone text-center col-md-4" style="padding: 5px;background-color: #ffd777;">Name</div>
                        <div v-if="inpart != 2" class="hidden-phone text-center col-md-5" style="padding: 5px;background-color: #ffd777;">Name</div>
                        <div class="hidden-phone text-center col-md-2" style="padding: 5px;background-color: #ffd777;">Gender</div>
                        <div class="hidden-phone text-center col-md-3" style="padding: 5px;background-color: #ffd777;">Action</div>
                    </div>
                </div>
                <div class="col-md-12" style="padding: 0px;">
                    <div class="col-md-12" v-for="s in student"  style="margin: 1px 0px;padding: 0px;background-color: #eee;">
                        <div class="col-md-12" style="margin: 3px 0px;padding: 5px 0px;">
                            <div v-if="inpart == 2" data-title="No" class="hidden-phone col-md-1 text-center">{{s.total}}</div>
                            <div data-title="Category" class="col-md-2 text-center">{{s.nis}}</div>
                            <div v-if="inpart == 2" data-title="Category" class="col-md-4 text-center">{{s.name}}</div>
                            <div v-if="inpart != 2" data-title="Category" class="col-md-5 text-center">{{s.name}}</div>
                            <div data-title="Category" class="col-md-2 text-center">{{s.gender}}</div>
                            <div class="col-md-3 text-center" data-title="Price">
                                <a class="btn btn-primary btn-xs" :href="link+s.id"><i class="fa fa-user"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->
        </div><!-- /content-panel -->
        </div>
    </div>
</template>

<script>
    import axios from 'axios'

    export default {
        data() {
            return {
                student:{},
                grade:{},
                search:'',
                editForm:'',
                selected: '1',
                inpart:'3',
                price:'',
                parts: [
                  
                  { text: 'Pay Complete', value: '3' },
                  { text: 'Not Complete', value: '2' },
                  { text: 'Not Pay', value: '1' }
                  
                ],
                link:'pay/detail/',
                pdf:'statstudent/pdf/',
                dummy:'/',
                url:'statstudent/getdata',
                addData:{'price':''}
            }
        },
        created:function () {
            console.log(this.inpart)
            this.fetchDataStudent(3)
            },
        methods: {
            editIt(modelId){
                return this.editForm=modelId;
            },
            showForm(modelId){
                if (this.editForm==modelId) {
                    return true;
                }
                    return false;
            },
            fetchDataStudent(){
                var vm = this
                axios.get(this.url+'?search='+this.search+'&grade='+this.selected+'&part='+this.inpart)
                        .then(function (response) {
                            Vue.set(vm.$data, 'grade',response.data.grade)
                            Vue.set(vm.$data, 'student',response.data.student)

                        })
            },
            detail(sid){
                axios.get('pay/detail/'+sid)
            },
            payed(sid){
                var vm = this
                var dataInput = vm.addData
                axios.post('pay/pay/'+sid, dataInput)
                        .then(function (){
                            alert('Pay Successfully')
                        })
            }
        }
    }
</script>
