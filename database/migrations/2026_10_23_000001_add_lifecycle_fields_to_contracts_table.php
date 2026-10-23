<?php

use Carbon\CarbonImmutable;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('contracts', function (Blueprint $table) {
            $table->string('status')->default('active')->index();
            $table->boolean('auto_renew')->default(false)->index();
            $table->unsignedSmallInteger('notice_period_months')->default(3);
            $table->unsignedSmallInteger('renewal_period_months')->default(12);
            $table->date('cancellation_received_at')->nullable();
            $table->date('cancellation_effective_at')->nullable()->index();
            $table->text('cancellation_reason')->nullable();
            $table->boolean('cancellation_is_goodwill')->default(false);
            $table->timestamp('mollie_canceled_at')->nullable();
        });

        $today = CarbonImmutable::now('Europe/Berlin')->toDateString();
        $recurringIntervals = ['daily', 'weekly', 'monthly', 'annual', 'yearly'];

        DB::table('contracts')
            ->whereNull('deleted_at')
            ->whereIn('interval', $recurringIntervals)
            ->whereNotNull('end_date')
            ->whereDate('end_date', '>=', $today)
            ->update([
                'status' => 'active',
                'auto_renew' => true,
                'notice_period_months' => 3,
                'renewal_period_months' => 12,
            ]);

        DB::table('contracts')
            ->whereNull('deleted_at')
            ->whereIn('interval', $recurringIntervals)
            ->whereNotNull('end_date')
            ->whereDate('end_date', '<', $today)
            ->update([
                'status' => 'ended',
                'auto_renew' => false,
            ]);
    }

    public function down(): void
    {
        Schema::table('contracts', function (Blueprint $table) {
            $table->dropIndex(['status']);
            $table->dropIndex(['auto_renew']);
            $table->dropIndex(['cancellation_effective_at']);
            $table->dropColumn([
                'status',
                'auto_renew',
                'notice_period_months',
                'renewal_period_months',
                'cancellation_received_at',
                'cancellation_effective_at',
                'cancellation_reason',
                'cancellation_is_goodwill',
                'mollie_canceled_at',
            ]);
        });
    }
};
