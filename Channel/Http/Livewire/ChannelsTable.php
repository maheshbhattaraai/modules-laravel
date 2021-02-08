<?php

namespace Modules\Channel\Http\Livewire;
use Modules\Channel\Entities\Channel;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\TableComponent;
use Rappasoft\LaravelLivewireTables\Traits\HtmlComponents;
use Rappasoft\LaravelLivewireTables\Views\Column;

class ChannelsTable extends TableComponent
{
    use HtmlComponents;

    /**
     * @var string
     */
    public $sortField = 'id';

    /**
     * @var string
     */
    public $status;

    /**
     * @var array
     */
    protected $options = [
        'bootstrap.container' => false,
        'bootstrap.classes.table' => 'table table-striped',
    ];

    /**
     * @param  string  $status
     */
    public function mount($status = 'active'): void
    {
        $this->status = $status;
    }

    /**
     * @return Builder
     */
    public function query(): Builder
    {
        $query = Channel::query();
        return $query;
    }

    /**
     * @return array
     */
    public function columns(): array
    {
        return [
            Column::make(__('ID'), 'id')
            ->searchable()
            ->sortable(),
            Column::make(__('Name'), 'name')
            ->searchable()
            ->sortable(),
            Column::make(__('Created On'), 'created_at')
            ->searchable()
            ->sortable()
            ->format(function (Channel $model) {
                return date("jS F, Y H:i A", strtotime($model->created_at));
            }),
            Column::make(__('Updated On'), 'updated_at')
            ->searchable()
            ->sortable()
            ->format(function (Channel $model) {
                return date("jS F, Y H:i A", strtotime($model->updated_at));
            }),
            Column::make(__('Actions'))
            ->format(function (Channel $model) {
                return view('channel::actions',['id'=>$model->id]);
            }),
            
        ];
    }
}
