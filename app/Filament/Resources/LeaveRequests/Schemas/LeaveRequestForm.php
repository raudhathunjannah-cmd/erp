<?php

namespace App\Filament\Resources\LeaveRequests\Schemas;

use App\Models\Employee;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class LeaveRequestForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Leave Request Information')
                    ->description('Please provide the leave request information below.')
                    ->schema([
                        
                        Select::make('employee_id')
                            ->label('Employee')
                            ->options(
                                Employee::with('user')
                                    ->get()
                                    ->mapWithKeys(fn (Employee $employee) => [
                                        $employee->id => $employee->user?->name
                                            ?? 'Employee #' . $employee->id,
                                    ])
                            )
                            ->searchable()
                            ->required(),

                        Select::make('leave_type')
                            ->label('Leave Type')
                            ->options([
                                'annual' => 'Annual Leave',
                                'sick' => 'Sick Leave',
                                'maternity' => 'Maternity Leave',
                                'other' => 'Other',
                            ])
                            ->required(),

                        DatePicker::make('start_date')
                            ->label('Start Date')
                            ->required(),

                        DatePicker::make('end_date')
                            ->label('End Date')
                            ->required(),

                        Textarea::make('reason')
                            ->label('Reason')
                            ->rows(3),

                        Select::make('status')
                            ->label('Status')
                            ->options([
                                'pending' => 'Pending',
                                'approved' => 'Approved',
                                'rejected' => 'Rejected',
                            ])
                            ->default('pending')
                            ->required(),

                    ])
                    ->columns(2)
                    ->columnSpanFull(),
            ]);
    }
}