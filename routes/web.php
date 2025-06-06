<?php

use App\Http\Controllers\CohortController;
use App\Http\Controllers\CommonLifeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RetroController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\KnowledgeController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\CommentController; // Use the controller for comments
use Illuminate\Support\Facades\Route;

// Redirect the root path to /dashboard
Route::redirect('/', 'dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware('verified')->group(function () {
        // Dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Cohorts
        Route::get('/cohorts', [CohortController::class, 'index'])->name('cohort.index');
        Route::get('/cohort/{cohort}', [CohortController::class, 'show'])->name('cohort.show');

        // Teachers
        Route::get('/teachers', [TeacherController::class, 'index'])->name('teacher.index');

        // Students
        Route::get('students', [StudentController::class, 'index'])->name('student.index');

        // Knowledge
        Route::get('knowledge', [KnowledgeController::class, 'index'])->name('knowledge.index');
        Route::post('knowledge', [KnowledgeController::class, 'store'])->name('knowledge.store'); // Route to store the ai generated test in the db
        Route::get('knowledge/{knowledge}', [KnowledgeController::class, 'fill'])->name('knowledge.fill'); // Route to go to the page to fill the test
        Route::post('knowledge/{knowledge}/submit', [KnowledgeController::class, 'submit'])->name('knowledge.submit'); // Route to submit the answers of the test
        Route::delete('knowledge/{knowledge}', [KnowledgeController::class, 'destroy'])->name('knowledge.destroy'); // Route to delete a test with its questions


        // Groups
        Route::get('groups', [GroupController::class, 'index'])->name('group.index');

        // Retro
        route::get('retros', [RetroController::class, 'index'])->name('retro.index');

        // Common life
        Route::get('common-life', [CommonLifeController::class, 'index'])->name('common-life.index');
        Route::post('common-life', [CommonLifeController::class, 'store'])->name('common-life.store'); // Route to store the task in the db
        Route::delete('common-life/{commonLife}', [CommonLifeController::class, 'destroy'])->name('common-life.destroy'); // Route to delete the task from the db
        Route::put('common-life/{commonLife}', [CommonLifeController::class, 'update'])->name('common-life.update'); // Route to update the task from the db
        Route::patch('common-life/{commonLife}', [CommonLifeController::class, 'close'])->name('common-life.close'); // Route to close a task from the db
        // Comment
            Route::post('comments', [CommentController::class, 'store'])->name('comments.store'); // Route to store a comment
            Route::delete('comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy'); // Route to delete a comment
            Route::patch('/comments/{comment}/update-comment', [CommentController::class, 'update'])->name('comments.update'); // Route to add a comment
    });
});

require __DIR__.'/auth.php';
