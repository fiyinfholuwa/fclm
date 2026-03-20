@extends('admin.app')

@section('content')


            <!-- Content Area -->
            <div class="content">
                <!-- Dashboard Home -->
                <div id="dashboard-home" class="page active">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>

                    <div class="stats-container">
                        <div class="stat-card">
                            <div class="stat-icon slider">
                                <i class="fas fa-images"></i>
                            </div>
                            <div class="stat-info">
                                <h3 id="slider-count">{{ $sliders }}</h3>
                                <p>Active Sliders</p>
                            </div>
                        </div>
                        <div class="stat-card">
                            <div class="stat-icon publications">
                                <i class="fas fa-book"></i>
                            </div>
                            <div class="stat-info">
                                <h3 id="publication-count">{{ $publication }}</h3>
                                <p>Total Publications</p>
                            </div>
                        </div>
                        <div class="stat-card">
                            <div class="stat-icon messages">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="stat-info">
                                <h3 id="message-count">{{ $messages }}</h3>
                                <p>New Messages</p>
                            </div>
                        </div>
                        <div class="stat-card">
                            <div class="stat-icon messages">
<i class="fas fa-chart-line"></i>                            </div>
                            <div class="stat-info">
                                <h3 id="message-count">{{ $totalVisits }}</h3>
                                <p>Total Visits</p>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title">Quick Actions</h2>
                        </div>
                        <div style="display: flex; gap: 15px; flex-wrap: wrap;">
                            <a style="text-decoration:none;" href="{{ route('slider.view') }}" class="btn-primary">
                                Manage Sliders
                            </a>
                            <a href="{{ route('publication.view') }}" style="text-decoration:none;" class="btn-success">
                                Manage Publications
                            </a>
                            <a href="{{ route('messages.view') }}" style="text-decoration:none;" class="btn-secondary">
                                 View Messages
                            </a>
                        </div>
                    </div>

                
                </div>


            </div>
        </main>

        
        

@endsection