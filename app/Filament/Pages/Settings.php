<?php

namespace App\Filament\Pages;

use App\Models\Setting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Filament\Notifications\Notification;
use Filament\Actions\Action;

class Settings extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static string $view = 'filament.pages.settings';

    protected static ?string $navigationGroup = 'Settings';

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill([
            'site_name' => Setting::get('site_name', 'Videograph'),
            'site_name_ar' => Setting::get('site_name_ar', 'فيديوجراف'),
            'logo' => Setting::get('logo'),
            'favicon' => Setting::get('favicon'),
            'about_title' => Setting::get('about_title', 'Who we are?'),
            'about_title_ar' => Setting::get('about_title_ar', 'من نحن؟'),
            'about_description' => Setting::get('about_description'),
            'about_description_ar' => Setting::get('about_description_ar'),
            'about_image_1' => Setting::get('about_image_1'),
            'about_image_2' => Setting::get('about_image_2'),
            'about_image_3' => Setting::get('about_image_3'),
            'services_title' => Setting::get('services_title', 'What We do?'),
            'services_title_ar' => Setting::get('services_title_ar', 'ماذا نفعل؟'),
            'services_description' => Setting::get('services_description'),
            'services_description_ar' => Setting::get('services_description_ar'),
            'facebook_url' => Setting::get('facebook_url'),
            'twitter_url' => Setting::get('twitter_url'),
            'instagram_url' => Setting::get('instagram_url'),
            'youtube_url' => Setting::get('youtube_url'),
            'snapchat_url' => Setting::get('snapchat_url'),
            'contact_email' => Setting::get('contact_email'),
            'contact_phone' => Setting::get('contact_phone'),
        ]);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('Settings')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('General')
                            ->schema([
                                Forms\Components\TextInput::make('site_name')
                                    ->label('Site Name')
                                    ->required(),
                                Forms\Components\TextInput::make('site_name_ar')
                                    ->label('Site Name (Arabic)'),
                                Forms\Components\FileUpload::make('logo')
                                    ->label('Logo')
                                    ->image()
                                    ->directory('settings/logo')
                                    ->imageEditor()
                                    ->maxSize(2048)
                                    ->helperText('Upload your website logo (recommended: PNG with transparent background)')
                                    ->columnSpanFull(),
                                Forms\Components\FileUpload::make('favicon')
                                    ->label('Favicon')
                                    ->image()
                                    ->directory('settings/favicon')
                                    ->maxSize(512)
                                    ->acceptedFileTypes(['image/png', 'image/x-icon', 'image/vnd.microsoft.icon'])
                                    ->helperText('Upload your website favicon (recommended: 32x32 or 16x16 PNG/ICO)')
                                    ->columnSpanFull(),
                            ]),

                        Forms\Components\Tabs\Tab::make('About Section')
                            ->schema([
                                Forms\Components\TextInput::make('about_title')
                                    ->label('Title'),
                                Forms\Components\TextInput::make('about_title_ar')
                                    ->label('Title (Arabic)'),
                                Forms\Components\Textarea::make('about_description')
                                    ->label('Description')
                                    ->rows(4),
                                Forms\Components\Textarea::make('about_description_ar')
                                    ->label('Description (Arabic)')
                                    ->rows(4),
                                Forms\Components\FileUpload::make('about_image_1')
                                    ->label('About Image 1 (large, left)')
                                    ->image()
                                    ->directory('settings/about')
                                    ->imageEditor()
                                    ->maxSize(2048)
                                    ->columnSpanFull(),
                                Forms\Components\FileUpload::make('about_image_2')
                                    ->label('About Image 2 (top right)')
                                    ->image()
                                    ->directory('settings/about')
                                    ->imageEditor()
                                    ->maxSize(2048)
                                    ->columnSpanFull(),
                                Forms\Components\FileUpload::make('about_image_3')
                                    ->label('About Image 3 (bottom right)')
                                    ->image()
                                    ->directory('settings/about')
                                    ->imageEditor()
                                    ->maxSize(2048)
                                    ->columnSpanFull(),
                            ]),

                        Forms\Components\Tabs\Tab::make('Services Section')
                            ->schema([
                                Forms\Components\TextInput::make('services_title')
                                    ->label('Title'),
                                Forms\Components\TextInput::make('services_title_ar')
                                    ->label('Title (Arabic)'),
                                Forms\Components\Textarea::make('services_description')
                                    ->label('Description')
                                    ->rows(4),
                                Forms\Components\Textarea::make('services_description_ar')
                                    ->label('Description (Arabic)')
                                    ->rows(4),
                            ]),

                        Forms\Components\Tabs\Tab::make('Social Media')
                            ->schema([
                                Forms\Components\TextInput::make('facebook_url')
                                    ->label('Facebook URL')
                                    ->url(),
                                Forms\Components\TextInput::make('twitter_url')
                                    ->label('Twitter URL')
                                    ->url(),
                                Forms\Components\TextInput::make('instagram_url')
                                    ->label('Instagram URL')
                                    ->url(),
                                Forms\Components\TextInput::make('youtube_url')
                                    ->label('YouTube URL')
                                    ->url(),
                                Forms\Components\TextInput::make('snapchat_url')
                                    ->label('Snapchat URL')
                                    ->url(),
                            ]),

                        Forms\Components\Tabs\Tab::make('Contact')
                            ->schema([
                                Forms\Components\TextInput::make('contact_email')
                                    ->label('Email')
                                    ->email(),
                                Forms\Components\TextInput::make('contact_phone')
                                    ->label('Phone'),
                            ]),
                    ])
                    ->columnSpanFull(),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();

        foreach ($data as $key => $value) {
            Setting::set($key, $value);
        }

        Notification::make()
            ->success()
            ->title('Settings saved successfully')
            ->send();
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label('Save')
                ->action('save'),
        ];
    }
}