<template>
    <div>
        <div class="col-md-12">
            <div class="form-panel col-md-12">
                            <form class="form-horizontal">
                              <div class="form-group" style="margin: 0px;">
                                  <label class="col-md-2 col-md-offset-2 control-label" style="text-align: center;font-weight: bolder;">
                                  Lists Of Guide
                                  </label>
                                  <div class="col-md-6">
                                      <select v-model="selected" class="form-control">
                                          <option v-for="part in options" v-bind:value="part.value">{{part.text}}</option>
                                      </select>
                                  </div>
                              </div>         
                            </form>
            </div><!-- /content-panel -->
        </div>
        <div class="col-md-12">
            <div class="form-panel col-md-12">
                <div class="col-md-12" style="padding: 0px;">
                    <div class="col-md-12" v-if="selected == 1">
                        <h3 style="text-align: center;">INTRODUCTION</h3>
                        <h5 style="text-align: center;">Please read all of guide before you use this program</h5>
                        <div class="col-md-12">
                            <h4>User on program</h4>
                            <div class="col-md-12">
                                in this program we have 3 roles of user :
                                <ol type="1">
                                    <li>
                                    SUPER ADMIN
                                    <p>user with this roles have every access on this program</p>
                                    </li>
                                    <li>
                                    ADMIN
                                    <p>user with this roles have every access on this program else admin page</p>
                                    </li>
                                    <li>
                                    OPERATOR
                                    <p>user with this roles have many access but not everything on this program</p>
                                    </li>
                                </ol>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h4>Getting started</h4>
                            <div class="col-md-12">
                                <p>To start using this program,first you must create <b>Courses,Divisions,Steps</b> and <b>Grades</b>,user can make this data is only <b>SUPER ADMIN</b> and <b>ADMIN</b>,for that operator can send feedback for them to create <b>Courses,Divisions,Steps</b> and <b>Grades</b> data.</p>

                                <p>Then you can insert student data,every user can input this data,after that you must declare the price of the event,user can declare the price is only <b>SUPER ADMIN</b> and <b>ADMIN</b>,for that operator can send feedback for them to declare the price</p>

                                <p>After declare the price,you can start pay and the pay will be save in transactions lists,aevery user have access to serve the pay.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12" v-if="selected == 2">
                        <div class="col-md-12">
                            <h4>Rule Of Admin Page</h4>
                            <div class="col-md-12">
                                Admin page only can access by <strong>SUPER ADMIN</strong>,admin and operator can't access admin page.
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h4>Create Admin</h4>
                            <div class="col-md-12">
                                To create or add new admin you can access <b>Manage</b> > <b>Admins</b> and click <b>add</b> button on top left,then you must insert <b>USERNAME,EMAIL,PASSWORD</b>,after that click create button,then you will redirect to lists of admin page.
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h4>Edit Admin</h4>
                            <div class="col-md-12">
                                To edit admin you can access <b>Manage</b> > <b>Admins</b> and click yellow button with pencil icon on the every row of admin,but you only can change <b>USERNAME,EMAIL</b>,after that click edit button,then you will redirect to lists of admin page.
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h4>Delete Admin</h4>
                            <div class="col-md-12">
                                To delete admin you can access <b>Manage</b> > <b>Admins</b> and click red button with trash icon on the every row of admin,then you will redirect to lists of admin page.
                            </div>
                        </div>
                        <div class="col-md-12"></div>
                    </div>

                    <div class="col-md-12" v-if="selected == 3">
                       <div class="col-md-12">
                            <h4>Rule Of Operator Page</h4>
                            <div class="col-md-12">
                                Operator page only can access by <strong>SUPER ADMIN,ADMIN</strong>,operator can't access operator page.
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h4>Create Operator</h4>
                            <div class="col-md-12">
                                To create or add new operator you can access <b>Manage</b> > <b>Operators</b> and click <b>add</b> button on top left,then you must insert <b>USERNAME,EMAIL,PASSWORD,COURSE</b>,after that click create button,then you will redirect to lists of operator page.<br>
                                <span style="color: red;">
                                (ATTENTION : if course that you want nothing in the lists,you must declare the course in <b>Settings</b> > <b>Courses</b>)
                                </span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h4>Edit Operator</h4>
                            <div class="col-md-12">
                                To edit operator you can access <b>Manage</b> > <b>Operators</b> and click yellow button with pencil icon on the every row of operator,but you only can change <b>USERNAME,EMAIL,COURSE</b>,after that click edit button,then you will redirect to lists of operator page.<br>
                                <span style="color: red;">
                                (ATTENTION : if course that you want nothing in the lists,you must declare the course in <b>Settings</b> > <b>Courses</b>)
                                </span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h4>Delete Operator</h4>
                            <div class="col-md-12">
                                To delete operator you can access <b>Manage</b> > <b>Operators</b> and click red button with trash icon on the every row of operator,then you will redirect to lists of operator page.
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12" v-if="selected == 4">
                       <div class="col-md-12">
                            <h4>Rule Of Student Page</h4>
                            <div class="col-md-12">
                                Student page can access by <strong>EVERYTHING USERS</strong>,but operator only can access grade where the course is same with the operator course.
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h4>Create Student</h4>
                            <div class="col-md-12">
                                To create or add new student you can access <b>Manage</b> > <b>Students</b> and choose <b>COURSE NAME</b>,after that choose <b>GRADE NAME</b>,and you can create students by filling the input like <b>NAME,NIS,GENDER</b>,then click create button.<br>
                                <span style="color: green;">
                                    (Tips : you can import data students from format <b>xlsx,xls,csv</b> by set data table <b>name,nis,gender</b>)
                                </span><br>
                                <span style="color: red;">
                                (ATTENTION : if course or grade that you want nothing in the lists,you must declare the course or Divisions in <b>Settings</b> > <b>Courses</b> or <b>Settings</b> > <b>Grades</b>)
                                </span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h4>Edit Student</h4>
                            <div class="col-md-12">
                                To edit student you can access <b>Manage</b> > <b>Students</b> and choose <b>COURSE NAME</b>,after that choose <b>GRADE NAME</b>,and click yellow button with pencil icon on the every row of student,then click edit button.<br>
                                <span style="color: red;">
                                (ATTENTION : if course or grade that you want nothing in the lists,you must declare the course or Divisions in <b>Settings</b> > <b>Courses</b> or <b>Settings</b> > <b>Grades</b>)
                                </span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h4>Delete Student</h4>
                            <div class="col-md-12">
                                To delete student you can access <b>Manage</b> > <b>Students</b> and choose <b>COURSE NAME</b>,after that choose <b>GRADE NAME</b>,and click red button with trash icon on the every row of student.<br>
                                <span style="color: red;">
                                (ATTENTION : if course or grade that you want nothing in the lists,you must declare the course or Divisions in <b>Settings</b> > <b>Courses</b> or <b>Settings</b> > <b>Grades</b>)
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12" v-if="selected == 5">
                       <div class="col-md-12">
                            <h4>Rule Of Feedback</h4>
                            <div class="col-md-12">
                                Student page can access by <strong>EVERYTHING USERS</strong>,but operator only can access grade where the course is same with the operator course.
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h4>Send Feedbacks</h4>
                            <div class="col-md-12">
                                To send or add new feedback you can access <b>Feedbacks</b>,after that write the feedback then click <b>SEND</b> button to send the feedback.<br>
                                <span style="color: red;">
                                (ATTENTION : user can send the feedback only <b>OPERATOR</b>,<b>SUPER ADMIN</b> and <b>ADMIN</b> only can read the feedbacks from <b>OPERATOR</b>)
                                </span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h4>Read Feedbacks</h4>
                            <div class="col-md-12">
                                To read feedback you can access <b>Manage</b> > <b>Feedbacks</b>,after that you can read all the lists of feedbacks.<br>
                                <span style="color: red;">
                                (ATTENTION : user can send the feedback only <b>SUPER ADMIN</b> and <b>ADMIN</b>,<b>OPERATOR</b> only can send the feedback to <b>SUPER ADMIN</b> and <b>ADMIN</b>)
                                </span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h4>Delete Student</h4>
                            <div class="col-md-12">
                                To delete student you can access <b>Manage</b> > <b>Students</b> and choose <b>COURSE NAME</b>,after that choose <b>GRADE NAME</b>,and click red button with trash icon on the every row of student.<br>
                                <span style="color: red;">
                                (ATTENTION : if course or grade that you want nothing in the lists,you must declare the course or Divisions in <b>Settings</b> > <b>Courses</b> or <b>Settings</b> > <b>Grades</b>)
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12" v-if="selected == 6">
                       <div class="col-md-12">
                            <h4>Rule Of Transactions</h4>
                            <div class="col-md-12">
                                Transactions page only can access by <b>SUPER ADMIN</b> and <b>ADMIN</b>,<b>OPERATOR</b> can't access Transactions page.
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h4>Read Transactions</h4>
                            <div class="col-md-12">
                                To read transactions you can access <b>Manage</b> > <b>Transactions</b>,after that choose <b>GRADE NAME</b> and you can search transactions by <b>STUDENT NAME</b>.<br>
                                <span style="color: red;">
                                (ATTENTION : user can read the transactions only <b>SUPER ADMIN</b> and <b>ADMIN</b>,<b>OPERATOR</b> can't read the transactions)
                                </span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h4>Edit Transactions</h4>
                            <div class="col-md-12">
                                To edit transactions you can access <b>Manage</b> > <b>Transactions</b>,after that choose <b>GRADE NAME</b> and you can search transactions by <b>STUDENT NAME</b>,then click green button with the pencil icon and write the new transactions to edit,after that click <b>EDIT</b> button.<br>
                                <span style="color: red;">
                                (ATTENTION : user can read the transactions only <b>SUPER ADMIN</b> and <b>ADMIN</b>,<b>OPERATOR</b> can't read the transactions)
                                </span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h4>Delete Transactions</h4>
                            <div class="col-md-12">
                                To delete transactions you can access <b>Manage</b> > <b>Transactions</b>,after that choose <b>GRADE NAME</b> and you can search transactions by <b>STUDENT NAME</b>,then click red button with the trash icon.<br>
                                <span style="color: red;">
                                (ATTENTION : user can read the transactions only <b>SUPER ADMIN</b> and <b>ADMIN</b>,<b>OPERATOR</b> can't read the transactions)
                                </span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h4>Detail Transactions</h4>
                            <div class="col-md-12">
                                To read detail transactions you can access <b>Manage</b> > <b>Transactions</b>,after that choose <b>GRADE NAME</b> and you can search transactions by <b>STUDENT NAME</b>,then click blue button with the user icon.<br>
                                <span style="color: red;">
                                (ATTENTION : user can read the transactions only <b>SUPER ADMIN</b> and <b>ADMIN</b>,<b>OPERATOR</b> can't read the transactions)
                                </span>
                            </div>
                        </div>
                    </div>

                     <div class="col-md-12" v-if="selected == 7">
                       <div class="col-md-12">
                            <h4>Rule Of Status Students</h4>
                            <div class="col-md-12">
                                Status students page can access by <b>EVERY USERS</b>.
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h4>Read Status Students</h4>
                            <div class="col-md-12">
                                To read status students you can access <b>Manage</b> > <b>Students</b>,after that choose <b>GRADE NAME</b> and <b>Category(Complete/Not Complete/Not Pay)</b>,then you can search status students by <b>STUDENT NAME</b>.<br>
                                 <span style="color: green;">
                                    (Tips : you can export data students to format <b>PDF</b>,click button <b>To PDF</b> and data in grade and category will be export to PDF)
                                </span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h4>Detail Status Students</h4>
                            <div class="col-md-12">
                                To read detail status students you can access <b>Manage</b> > <b>Transactions</b>,after that choose <b>GRADE NAME</b> and you can search transactions by <b>STUDENT NAME</b>,then click blue button with the user icon.<br>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12" v-if="selected == 8">
                       <div class="col-md-12">
                            <h4>Rule Of Settings</h4>
                            <div class="col-md-12">
                                Settings page only can access by <b>SUPER ADMIN</b> and <b>ADMIN</b>,<b>OPERATOR</b> can't access Settings page.
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h4>Create Courses</h4>
                            <div class="col-md-12">
                                To create or add new course you can access <b>Settings</b> > <b>Courses</b>,after that insert <b>Course Name</b> like <b>KOMPUTER,BANGUNAN,LISTRIK</b>.<br>
                                 <span style="color: red;">
                                (ATTENTION : if you create course,first you must create course for admin,course for admin is <b>CENTER</b> if you have this course don't delete this courses)
                                </span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h4>Create Divisions</h4>
                            <div class="col-md-12">
                                To create or add new course you can access <b>Settings</b> > <b>Divisions</b>,after that insert <b>Division Name</b> like <b>REKAYASA PERANGKAT LUNAK 1 or TEKNIK BODY OTOMOTIF</b>,then choose the course name.<br>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h4>Create Steps</h4>
                            <div class="col-md-12">
                                To create or add new step you can access <b>Settings</b> > <b>Steps</b>,after that insert <b>Step</b> like <b>X,XI,XII</b>.<br>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h4>Create Grades</h4>
                            <div class="col-md-12">
                                To create or add new grade you can access <b>Settings</b> > <b>Grades</b>,after that select <b>Division Name</b> like <b>REKAYASA PERANGKAT LUNAK 1 or TEKNIK BODY OTOMOTIF</b> and select Step</b> like <b>X,XI,XII</b>.<br>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12" v-if="selected == 9">
                       <div class="col-md-12">
                            <h4>Rule To Declare Price</h4>
                            <div class="col-md-12">
                                Price page only can access by <b>SUPER ADMIN</b> and <b>ADMIN</b>,<b>OPERATOR</b> can't access Price page.
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h4>Declare Price</h4>
                            <div class="col-md-12">
                                To declare price you can access <b>Price</b>,after that insert price and click button <b>Declare</b>.
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h4>Edit Price</h4>
                            <div class="col-md-12">
                                To edit price you can access <b>Price</b>,after that insert price and click button <b>Edit</b>.
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12" v-if="selected == 10">
                       <div class="col-md-12">
                            <h4>Rule To Pay</h4>
                            <div class="col-md-12">
                                Pay page can access by <b>EVERY USERS</b>.
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h4>Pay</h4>
                            <div class="col-md-12">
                                To pay you can access <b>Pay</b>,and choose <b>GRADE NAME</b> then you can search student by <b>STUDENT NAME</b>,click green button with the money icon and the form to pay will be appear,then insert the price to pay,after that click pay button.
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h4>Detail Students</h4>
                            <div class="col-md-12">
                                To read detail students you can access <b>Pay</b>,after that choose <b>GRADE NAME</b> and you can search student by <b>STUDENT NAME</b>,then click blue button with the user icon.<br>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12" v-if="selected == 11">
                        <div class="col-md-12">
                            <h4>Import data students</h4>
                            <div class="col-md-12">
                                
                                To import data students you must create data like table bellow.<br>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>nis</th>
                                            <th>name</th>
                                            <th>gender</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>11522599</td>
                                            <td>Abis Ismail</td>
                                            <td>laki-laki</td>
                                        </tr>
                                        <tr>
                                            <td>11522600</td>
                                            <td>Achmad Aldy Sutanto</td>
                                            <td>laki-laki</td>
                                        </tr>
                                        <tr>
                                            <td>11522601</td>
                                            <td>Ademay Elida</td>
                                            <td>perempuan</td>
                                        </tr>
                                    </tbody>
                                </table>
                                Then you can access <b>Manage</b> > <b>Students</b>,choose <b>COURSE NAME</b>,then choose <b>GRADE NAME</b>,after that click <b>IMPORT</b>,to import data students file format must be on <b>xls,xlsx,csv</b>.
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
                guideon:'1',
                selected: '1',
                price:'',
                options: [
                  { text: 'Introduction', value: '1' },
                  { text: 'Manage admin and rule of admin Page', value: '2' },
                  { text: 'Manage operator and rule of operator page', value: '3' },
                  { text: 'Manage student and rule of student page', value: '4' },
                  { text: 'Rule of feedback', value: '5' },
                  { text: 'Rule of transaction and the function', value: '6' },
                  { text: 'Rule of student in status and the function', value: '7' },
                  { text: 'Setting Courses,Divisions,Steps and Grades', value: '8' },
                  { text: 'How to declare and edit price', value: '9' },
                  { text: 'How to pay', value: '10' },
                  { text: 'Import data students from xls,xlsx,csv format', value: '11' }
                ],
                link:'pay/detail/',
                pdfit:'transaction/pdfit/',
                pdfall:'transaction/pdfall',
                url:'transaction/getdata',
                addData:{'price':''}
            }
        },
        created:function () {

            },
        methods: {
            editIt(){
                return this.selected=1;
            },
            showContent(modelId){
                if (this.guideon==modelId) {
                    return true;
                }
                    return false;
            }
        }
    }
</script>
