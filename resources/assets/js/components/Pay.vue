<template>
    <div>
        <div class="col-md-12">
            <div class="form-panel col-md-12">
                      <h4 class="mb"><i class="fa fa-angle-right"></i> Search Student</h4>
                                     <form class="form-horizontal">
                              <div class="form-group">
                                <div class="col-md-4">
                                  <!-- <select class="form-control" v-model="selected">                                  
                                            <option v-for="g in grade">{{g.step}} - {{g.division_name}}</option>
                                  </select> -->
                                  <select v-model="selected" class="form-control" v-on:click="fetchDataStudent()">
                                    <option v-bind:value="0">Choose the grade</option>
                                      <option v-for="option in grade" v-bind:value="option.id">
                                        {{ option.step }} {{ option.division_name }}
                                      </option>
                                    </select>
                                </div>
                                <div class="col-md-8" v-if="selected != 0">
                                  <input type="search" class="form-control" placeholder="Search" v-on:keyup="fetchDataStudent()" v-model="search" required="true">
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
                        <div class="hidden-phone text-center col-md-3" style="padding: 5px;background-color: #ffd777;">NIS</div>
                        <div class="hidden-phone text-center col-md-4" style="padding: 5px;background-color: #ffd777;">Name</div>
                        <div class="hidden-phone text-center col-md-2" style="padding: 5px;background-color: #ffd777;">Gender</div>
                        <div class="hidden-phone text-center col-md-3" style="padding: 5px;background-color: #ffd777;">Action</div>
                    </div>
                </div>
                <div class="col-md-12" style="padding: 0px;">
                    <div class="col-md-12" v-if="selected == 0" style="text-align: center;padding: 10px 0px;">
                        <h3>Choose the grade</h3>
                    </div>
                    <div class="col-md-12" v-for="(s, index) in student"  style="margin: 1px 0px;padding: 0px;background-color: #eee;">
                        <div class="col-md-12" style="margin: 3px 0px;padding: 5px 0px;">
                            <div data-title="Category" class="col-md-3 text-center">{{s.nis}}</div>
                            <div data-title="Category" class="col-md-4 text-center">{{s.name}}</div>
                            <div data-title="Category" class="col-md-2 text-center">{{s.gender}}</div>
                            <div class="col-md-3 text-center" data-title="Price">
                                <a class="btn btn-success btn-xs" v-on:click="editIt(s.id)"><i class="fa fa-money"></i></a>
                                <a class="btn btn-primary btn-xs" :href="link+s.id"><i class="fa fa-user"></i></a>
                            </div>
                        </div>
                        <div class="col-md-12" style="margin: 5px 0px;" v-show="showForm(s.id)">
                            <form v-on:submit.prevent="payed(s.id)" class="col-md-10 form-inline">
                                <div class="form-group col-md-12">
                                    <div class="col-md-8" style="margin-bottom: 5px;"> <input type="number" class="form-control" v-model="addData.price" style="width: 100%;margin-bottom: 5px;"></div>
                                    <div class="col-md-4"><input type="submit" name="pay" class="btn btn-success" value="Pay" style="width: 100%;"></div>
                                </div>
                            </form>
                            <div class="col-md-2"><input type="submit" name="cancel" class="btn btn-danger" value="Cancel" style="width: 100%;" v-on:click="editIt(0)"></div> 
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
                selected: '0',
                price:'',
                options: [
                  { text: 'One', value: 'A' },
                  { text: 'Two', value: 'B' },
                  { text: 'Three', value: 'C' }
                ],
                callprice:0,
                link:'pay/detail/',
                url:'pay/getdata',
                addData:{'price':''}
            }
        },
        created:function () {

            this.fetchDataStudent()
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
            fetchDataStudent:function(){
                var vm = this
                axios.get(`${this.url}?search=${this.search}&grade=${this.selected}`)
                        .then(function (response) {
                            Vue.set(vm.$data, 'grade',response.data.grade)
                            Vue.set(vm.$data, 'student',response.data.student)
                            Vue.set(vm.$data, 'callprice',response.data.callprice)

                        })
            },
            detail(sid){
                axios.get('pay/detail/'+sid)
            },
            payed(sid){
                var vm = this
                var dataInput = vm.addData
                if (dataInput.price == "") {
                    alert('Price can not be empty')
                }else{
                    if (dataInput.price > vm.callprice) {
                        alert('Pay can not be more than price')
                    }else{
                        axios.post('pay/pay/'+sid+'?search='+this.search+'&grade='+this.selected, dataInput)
                        .then(function (response) {
                            Vue.set(vm.$data, 'grade',response.data.grade)
                            Vue.set(vm.$data, 'student',response.data.student)
                            Vue.set(vm.$data, 'callprice',response.data.callprice)
                            alert('Pay Successfully')
                        })
                    }
                }
            }
        }
    }
</script>
