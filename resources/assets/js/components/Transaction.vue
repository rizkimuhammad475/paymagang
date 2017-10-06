<template>
    <div>
        <div class="col-md-12">
            <div class="form-panel col-md-12">
                      <h4 class="mb"><i class="fa fa-angle-right"></i> Search Transaction</h4>
                                     <form class="form-horizontal">
                              <div class="form-group">
                                <div class="col-md-5" style="margin: 5px 0px;">
                                  <!-- <select class="form-control" v-model="selected">                                  
                                            <option v-for="g in grade">{{g.step}} - {{g.division_name}}</option>
                                  </select> -->
                                  <select v-model="selected" class="form-control" v-on:click="fetchDataStudent()">
                                      <option v-for="option in grade" v-bind:value="option.id">
                                        {{ option.step }} {{ option.division_name }}
                                      </option>
                                    </select>
                                </div>
                                <div class="col-md-5" style="margin: 5px 0px;">
                                  <input type="search" class="form-control" placeholder="Search" v-on:keyup="fetchDataStudent()" v-model="search">
                                </div>
                                <div class="col-md-2" style="margin: 5px 0px;">
                                    <a :href="pdfall" class="bt btn-success form-control" style="text-align: center;">PDF ALL</a>
                                </div>
                              </div>  
                              <div class="btn-group col-md-12 mb" style="padding: 0px;">
                                  <a :href="expxlsx" class="btn btn-primary col-md-4">Export xlsx</a>
                                  <a :href="expxls" class="btn btn-primary col-md-4">Export xls</a>
                                  <a :href="expcsv" class="btn btn-primary col-md-4">Export csv</a>
                                </div>         
                          </form>
        </div><!-- /content-panel -->
        </div>
        <div class="col-md-12">
            <div class="form-panel col-md-12">
            <div class="col-md-12" style="padding: 0px;">
                <div class="cf col-md-12" style="padding: 0px;">
                    <div>
                        <div class="col-md-2 hidden-phone text-center" style="padding: 5px;background-color: #ffd777;">Date</div>
                        <div class="col-md-2 hidden-phone text-center" style="padding: 5px;background-color: #ffd777;">Name</div>
                        <div class="col-md-3 hidden-phone text-center" style="padding: 5px;background-color: #ffd777;">Grade</div>
                        <div class="col-md-2 hidden-phone text-center" style="padding: 5px;background-color: #ffd777;">Operator</div>
                        <div class="col-md-1 hidden-phone text-center" style="padding: 5px;background-color: #ffd777;">Pay</div>
                        <div class="col-md-2 hidden-phone text-center" style="padding: 5px;background-color: #ffd777;">Action</div>
                    </div>
                </div>
                <div class="col-md-12" style="padding: 0px;">
                    <div class="col-md-12" v-for="s in transaction" style="margin: 1px 0px;padding: 0px;background-color: #eee;">
                        <div class="col-md-12" style="margin: 3px 0px;padding: 5px 0px;">
                            <div data-title="Category" class="col-md-2 text-center">{{s.created_at}}</div>
                            <div data-title="Category" class="col-md-2 text-center">{{s.name}}</div>
                            <div data-title="Category" class="col-md-3 text-center">{{s.step}} {{s.division_name}}</div>
                            <div data-title="Category" class="col-md-2 text-center">{{s.username}}</div>
                            <div data-title="Category" class="col-md-1 text-center">{{s.pay}}</div>
                            <div class="col-md-2 text-center" data-title="Price">
                                <a class="btn btn-success btn-xs" v-on:click="editIt(s.id)"><i class="fa fa-pencil"></i></a>
                                <a class="btn btn-danger btn-xs" v-on:click="deleteIt(s.tid)"><i class="fa fa-trash-o"></i></a>
                                <a class="btn btn-primary btn-xs" :href="link+s.sid"><i class="fa fa-user"></i></a>
                            </div>
                        </div>
                        <div class="col-md-12" style="margin: 5px 0px;" v-show="showForm(s.id)">
                            <form v-on:submit.prevent="edited(s.tid)" class="col-md-10 form-inline">
                                <div class="form-group col-md-12">
                                    <div class="col-md-8" style="margin-bottom: 5px;"> <input type="number" class="form-control" v-model="addData.price" style="width: 100%;margin-bottom: 5px;"></div>
                                    <div class="col-md-4"><input type="submit" name="pay" class="btn btn-success" value="Edit" style="width: 100%;"></div>
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
                transaction:{},
                grade:{},
                search:'',
                editForm:'',
                selected: '1',
                price:'',
                options: [
                  { text: 'One', value: 'A' },
                  { text: 'Two', value: 'B' },
                  { text: 'Three', value: 'C' }
                ],
                link:'pay/detail/',
                pdfit:'transaction/pdfit/',
                expcsv:'transaction/export/csv',
                expxls:'transaction/export/xls',
                expxlsx:'transaction/export/xlsx',
                pdfall:'transaction/pdfall',
                url:'transaction/getdata',
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
                            Vue.set(vm.$data, 'transaction',response.data.transaction)

                        })
            },
            detail(sid){
                axios.get('pay/detail/'+sid)
            },
            deleteIt(tid){
                var vm = this
                var dataInput = vm.addData
                axios.get('transaction/delete/'+tid+'/'+vm.selected+'?search='+vm.search, dataInput)
                        .then(function (response){
                            Vue.set(vm.$data, 'grade',response.data.grade)
                            Vue.set(vm.$data, 'transaction',response.data.transaction)
                            alert('Delete Successfully')
                        })
            },
            edited(tid){
                var vm = this
                var dataInput = vm.addData
                if (dataInput.price == "") {
                    alert('Price can not be empty')
                }else{
                axios.post('transaction/edit/'+tid+'/'+vm.selected+'?search='+vm.search, dataInput)
                        .then(function (response){
                            Vue.set(vm.$data, 'grade',response.data.grade)
                            Vue.set(vm.$data, 'transaction',response.data.transaction)
                            alert('Edit Successfully')
                        })
                }
            }
        }
    }
</script>
