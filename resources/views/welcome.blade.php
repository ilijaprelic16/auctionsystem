@extends('layouts.app')

@section('content')
    <div class="container pt-2">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">Welcome</div>

                    <div class="card-body">
                        <div class="container">

                            <!-- Page Heading -->
                            <h1 class="my-4">Page Heading
                                <small>Secondary Text</small>
                            </h1>

                            <!-- Project One -->
                            <div class="row">
                                <div class="col-md-7">
                                    <a href="#">
                                        <img class="img-fluid rounded mb-3 mb-md-0" src="http://placehold.it/700x300"
                                             alt="">
                                    </a>
                                </div>
                                <div class="col-md-5">
                                    <h3>Project One</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
                                    <a class="btn btn-primary" href="#">View Project</a>
                                </div>
                            </div>
                            <!-- /.row -->

                            <hr>

                            <!-- Project Two -->
                            <div class="row">
                                <div class="col-md-7">
                                    <a href="#">
                                        <img class="img-fluid rounded mb-3 mb-md-0" src="http://placehold.it/700x300"
                                             alt="">
                                    </a>
                                </div>
                                <div class="col-md-5">
                                    <h3>Project Two</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
                                    <a class="btn btn-primary" href="#">View Project</a>
                                </div>
                            </div>
                            <!-- /.row -->

                            <hr>

                            <!-- Project Three -->
                            <div class="row">
                                <div class="col-md-7">
                                    <a href="#">
                                        <img class="img-fluid rounded mb-3 mb-md-0" src="http://placehold.it/700x300"
                                             alt="">
                                    </a>
                                </div>
                                <div class="col-md-5">
                                    <h3>Project Three</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
                                    <a class="btn btn-primary" href="#">View Project</a>
                                </div>
                            </div>
                            <!-- /.row -->

                            <hr>

                            <!-- Project Four -->
                            <div class="row">

                                <div class="col-md-7">
                                    <a href="#">
                                        <img class="img-fluid rounded mb-3 mb-md-0" src="http://placehold.it/700x300"
                                             alt="">
                                    </a>
                                </div>
                                <div class="col-md-5">
                                    <h3>Project Four</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                    <a class="btn btn-primary" href="#">View Project</a>
                                </div>
                            </div>
                            <!-- /.row -->

                            <hr>

                            <!-- Pagination -->
                            <ul class="pagination justify-content-center">
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">1</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">2</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">3</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
