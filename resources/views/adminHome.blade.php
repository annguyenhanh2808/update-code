@extends('layouts.app')

@section('content')
    <h1>Create Account</h1>
    <div class="account-list">
        <div class="account-list-top">
            <h2>List of Account</h2>
            <!-- <div class="input-field">
                <span class="material-icons-sharp">search</span>
              <input type="text" placeholder="Search" />
            </div> -->
        </div>

        <table>
            <thead>
            <tr>
                <th>Username</th>
                <th>Password</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Gender</th>
                <th>Date of Birth</th>
                <th>Role</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>nam123</td>
                <td>1212</td>
                <td>0918000000</td>
                <td>Hanoi</td>
                <td>Male</td>
                <td>10/11/1999</td>
                <td>Staff</td>
                <td class="action"><a href=""><span class="material-icons-sharp">edit</span></a> <a href=""><span class="material-icons-sharp">delete</span></a></td>
            </tr>

            <tr>
                <td>nam123</td>
                <td>1212</td>
                <td>0918000000</td>
                <td>Hanoi</td>
                <td>Male</td>
                <td>10/11/1999</td>
                <td>Staff</td>
                <td class="action"><a href=""><span class="material-icons-sharp">edit</span></a> <a href=""><span class="material-icons-sharp">delete</span></a></td>
            </tr>

            <tr>
                <td>nam123</td>
                <td>1212</td>
                <td>0918000000</td>
                <td>Hanoi</td>
                <td>Male</td>
                <td>10/11/1999</td>
                <td>Staff</td>
                <td class="action"><a href=""><span class="material-icons-sharp">edit</span></a> <a href=""><span class="material-icons-sharp">delete</span></a></td>
            </tr>


            </tbody>
        </table>
        <a href="#">Show All</a>
    </div>


    <!-- ======================= LIST POST ==================================== -->
    <h2>List of Idea</h2>
    <div class="card-container">
        <div class="header">
            <a href="#">
                <div class="profile-post">
                    <div class="profile-photo">
                        <img src="./img/Person.jpg" alt="">
                    </div>
                    <div class="info">
                        <p>Nam Nguyen</p>
                        <small class="text-muted">Staff</small>
                    </div>
                </div>
                <div class="idea-description">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Sit et obcaecati suscipit provident itaque corporis,
                        eaque minima assumenda libero reprehenderit ut ducimus aperiam
                        illo fugit iste eius corrupti id velit? Lorem ipsum dolor sit,
                        amet consectetur adipisicing elit. Est impedit cumque quaerat
                        nesciunt, ipsum sunt facilis incidunt amet, commodi unde
                        eveniet doloribus ad libero ex obcaecati vel eos, explicabo soluta?</p>
                </div>
                <div class="reaction">
                    <div class="like">
                        <span class="material-icons-sharp">thumb_up_off_alt</span>
                        <small>100</small>
                    </div>
                    <div class="dislike">
                        <span class="material-icons-sharp">thumb_down</span>
                        <small>20</small>
                    </div>
                    <div class="comment">
                        <span class="material-icons-sharp">textsms</span>
                        <small>20</small>
                    </div>
                </div>
            </a>
        </div>
    </div>
@endsection
