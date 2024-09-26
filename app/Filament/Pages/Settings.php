<?php

namespace App\Filament\Pages;

use App\Settings\GeneralSettings;
use Filament\Forms;
use App\Rules\EamilDomains;

use Filament\Forms\Form;
use Filament\Pages\SettingsPage;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Cheesegrits\FilamentGoogleMaps\Fields\Map;

class Settings extends SettingsPage
{
    public static function getNavigationGroup(): ?string
    {
        return __('Settings');
    }
    public static function getNavigationLabel(): string
    {
        return __('Settings');
    }
    public function getTitle(): string
    {
        return __('Settings');
    }

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';
    protected static ?int $navigationSort = 7;
    protected static string $settings = GeneralSettings::class;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Settings')
                    ->tabs([
                        Tabs\Tab::make(__('General'))
                            ->icon('heroicon-o-cog-6-tooth')
                            ->badge(4)
                            ->schema([
                                TextInput::make('site_name_ar')
                                    ->label(__('Site Name (Arabic)'))
                                    ->autofocus()
                                    ->minLength(3)
                                    ->maxLength(255)
                                    ->required(),
                                TextInput::make('site_name_en')
                                    ->label(__('Site Name (English)'))
                                    ->autofocus()
                                    ->minLength(3)
                                    ->maxLength(255)
                                    ->required(),
                                Textarea::make('decs_footer_ar')
                                    ->label(__('Description Footer (Arabic)'))
                                    ->autofocus()
                                    ->minLength(3)
                                    ->rows(5)
                                    ->required(),
                                Textarea::make('decs_footer_en')
                                    ->label(__('Description Footer (English)'))
                                    ->autofocus()
                                    ->minLength(3)
                                    ->rows(5)
                                    ->required(),
                                FileUpload::make('logo')
                                    ->label(__('Logo'))
                                    ->image()
                                    ->disk('public')
                                    ->directory('settings')
                                    ->preserveFilenames()
                                    ->reorderable()
                                    ->required(),
                                FileUpload::make('logo_footer')
                                    ->label(__('Logo Footer'))
                                    ->image()
                                    ->disk('public')
                                    ->directory('settings')
                                    ->preserveFilenames()
                                    ->reorderable()
                                    ->required(),

                                FileUpload::make('favicon')
                                    ->label(__('Favicon'))
                                    ->image()
                                    ->disk('public')
                                    ->directory('settings')
                                    ->preserveFilenames()
                                    ->columnSpanFull()

                                    ->reorderable()
                                    ->required(),


                            ])->columns(2),
                        Tabs\Tab::make(__('Contact Details'))
                            ->icon('heroicon-o-at-symbol')
                            ->badge(11)
                            ->schema([
                                TextInput::make('email')
                                    ->label(__('Email'))
                                    ->autofocus()
                                    ->email()
                                    ->rule(new EamilDomains())
                                    ->minLength(3)
                                    ->required(),
                                TextInput::make('phone')
                                    ->label(__('Phone'))
                                    ->autofocus()
                                    ->maxLength(15)
                                    ->required(),
                                TextInput::make('whatsapp')
                                    ->label(__('whatsapp'))
                                    ->autofocus()
                                    ->maxLength(20)
                                    ->required(),


                                TextInput::make('website')
                                    ->label(__('website'))
                                    ->autofocus()
                                    ->url()
                                    ->required(),
                                TextInput::make('facebook')
                                    ->label(__('facebook'))
                                    ->autofocus()
                                    ->url()
                                    // ->rules([
                                    //     fn(): Closure => function (string $attribute, $value, Closure $fail) {
                                    //         $facebookUrlPattern = '/^(https?:\/\/)?(www\.)?facebook\.com\/[a-zA-Z0-9(\.\?)?]+/';
                                    //         if (!preg_match($facebookUrlPattern, $value)) {
                                    //             $fail(__('The Facebook URL is invalid.'));
                                    //         }
                                    //     },
                                    // ])
                                    ->required(),
                                TextInput::make('twitter')
                                    ->label(__('twitter'))
                                    ->autofocus()
                                    ->url()
                                    // ->rules([
                                    //     fn(): Closure => function (string $attribute, $value, Closure $fail) {
                                    //         $twitterUrlPattern = '/^(https?:\/\/)?(www\.)?twitter\.com\/[a-zA-Z0-9(\.\?)?]+/';
                                    //         if (!preg_match($twitterUrlPattern, $value)) {
                                    //             $fail(__('The Twitter URL is invalid.'));
                                    //         }
                                    //     },
                                    // ])
                                    ->required(),
                                TextInput::make('snapchat')
                                    ->label(__('snapchat'))
                                    ->autofocus()
                                    ->url()
                                    // ->rules([
                                    //     fn(): Closure => function (string $attribute, $value, Closure $fail) {
                                    //         $snapchatUrlPattern = '/^(https?:\/\/)?(www\.)?snapchat\.com\/[a-zA-Z0-9(\.\?)?]+/';
                                    //         if (!preg_match($snapchatUrlPattern, $value)) {
                                    //             $fail(__('The Snapchat URL is invalid.'));
                                    //         }
                                    //     },
                                    // ])
                                    ->required(),
                                TextInput::make('youtube')
                                    ->label(__('youtube'))
                                    ->autofocus()
                                    ->url()
                                    // ->rules([
                                    //     fn(): Closure => function (string $attribute, $value, Closure $fail) {
                                    //         $youtubeUrlPattern = '/^(https?:\/\/)?(www\.)?youtube\.com\/[a-zA-Z0-9(\.\?)?]+/';
                                    //         if (!preg_match($youtubeUrlPattern, $value)) {
                                    //             $fail(__('The YouTube URL is invalid.'));
                                    //         }
                                    //     },
                                    // ])
                                    ->required(),
                                TextInput::make('instagram')
                                    ->label(__('instagram'))
                                    ->autofocus()
                                    ->url()
                                    // ->rules([
                                    //     fn(): Closure => function (string $attribute, $value, Closure $fail) {
                                    //         $instagramUrlPattern = '/^(https?:\/\/)?(www\.)?instagram\.com\/[a-zA-Z0-9(\.\?)?]+/';
                                    //         if (!preg_match($instagramUrlPattern, $value)) {
                                    //             $fail(__('The Instagram URL is invalid.'));
                                    //         }
                                    //     },
                                    // ])
                                    ->required(),
                                TextInput::make('linkedin')
                                    ->label(__('linkedin'))
                                    ->autofocus()

                                    ->url()
                                    // ->rules([
                                    //     fn(): Closure => function (string $attribute, $value, Closure $fail) {
                                    //         $linkedinUrlPattern = '/^(https?:\/\/)?(www\.)?linkedin\.com\/[a-zA-Z0-9(\.\?)?]+/';
                                    //         if (!preg_match($linkedinUrlPattern, $value)) {
                                    //             $fail(__('The Linkedin URL is invalid.'));
                                    //         }
                                    //     },
                                    // ])
                                    ->required(),
                                TextInput::make('address')
                                    ->label(__('Address'))
                                    ->autofocus()
                                    ->placeholder(__('Enter your address'))
                                    ->required()
                                    ->columnSpanFull()
                                    ->maxLength(255),
                                Map::make('location')
                                    ->hiddenLabel()
                                    ->columnSpanFull()

                                    ->mapControls([
                                        'mapTypeControl'    => true,
                                        'scaleControl'      => true,
                                        'rotateControl'     => true,
                                        'fullscreenControl' => true,
                                        'searchBoxControl'  => false, // creates geocomplete field inside map
                                        'zoomControl'       => false,
                                    ])
                                    ->height(fn() => '400px') // map height (width is controlled by Filament options)
                                    ->defaultZoom(5) // default zoom level when opening form
                                    ->autocomplete('address') // field on form to use as Places geocompletion field
                                    ->draggable(false) // allow dragging to move marker

                                    ->clickable(false) // allow clicking to move marker

                            ])->columns(2),
                        Tabs\Tab::make(__('SEO'))
                            ->icon('heroicon-o-globe-europe-africa')
                            ->badge(6)
                            ->schema([

                                TextInput::make('meta_title_ar')
                                    ->label(__('Meta Title (Arabic)'))
                                    ->autofocus()
                                    ->minLength(3)
                                    ->maxLength(255)
                                    ->required(),
                                TextInput::make('meta_title_en')
                                    ->label(__('Meta Title (English)'))
                                    ->autofocus()
                                    ->minLength(3)
                                    ->maxLength(255)
                                    ->required(),
                                Textarea::make('meta_description_ar')
                                    ->label(__('Meta Description (Arabic)'))
                                    ->autofocus()
                                    ->minLength(3)
                                    ->rows(5)
                                    ->required(),
                                Textarea::make('meta_description_en')
                                    ->label(__('Meta Description (English)'))
                                    ->autofocus()
                                    ->minLength(3)
                                    ->rows(5)
                                    ->required(),
                                TagsInput::make('meta_keywords_ar')
                                    ->label(__('Meta Keywords (Arabic)'))
                                    ->reorderable()

                                    ->required(),
                                TagsInput::make('meta_keywords_en')
                                    ->label(__('Meta Keywords (English)'))
                                    ->reorderable()

                                    ->required(),
                            ])->columns(2),


                        Tabs\Tab::make(__('About Us Page'))
                            ->icon('heroicon-o-megaphone')
                            ->badge(7)
                            ->schema([

                                Grid::make()->schema([
                                    Section::make(__('About Us Information'))
                                        ->description(__('This is the main information about the about us.'))
                                        ->collapsible(true)
                                        ->schema([
                                            Textarea::make('about_desc_ar')
                                                ->label(__('Description (Arabic)'))
                                                ->autofocus()
                                                ->minLength(3)
                                                ->rows(6)

                                                ->required(),
                                            Textarea::make('about_desc_en')
                                                ->label(__('Description (English)'))
                                                ->autofocus()
                                                ->minLength(3)
                                                ->rows(6)

                                                ->required(),

                                            FileUpload::make('about_image')
                                                ->label(__('About Us image'))
                                                ->image()
                                                ->disk('public')
                                                ->directory('settings')
                                                ->columnSpanFull()
                                                ->preserveFilenames()
                                                ->reorderable()
                                                ->required(),



                                        ])->columns(2),


                                    Section::make(__('Seo Information'))
                                        ->description(__('This is the main information about the review.'))
                                        ->collapsible(true)

                                        ->schema([

                                            TextInput::make('seo_title_ar')
                                                ->label(__('seo_title_ar'))
                                                ->autofocus()
                                                ->minLength(3)
                                                ->maxLength(255)
                                                ->required(),
                                            TextInput::make('seo_title_en')
                                                ->label(__('seo_title_en'))
                                                ->autofocus()
                                                ->minLength(3)
                                                ->maxLength(255)
                                                ->required(),
                                            Textarea::make('seo_desc_ar')
                                                ->label(__('Description (Arabic)'))
                                                ->autofocus()
                                                ->minLength(3)
                                                ->rows(6)
                                                ->required(),
                                            Textarea::make('seo_desc_en')
                                                ->label(__('Description (English)'))
                                                ->autofocus()
                                                ->rows(6)

                                                ->minLength(3)
                                                ->required(),
                                            FileUpload::make('seo_image')
                                                ->label(__('seo image'))
                                                ->image()
                                                ->disk('public')
                                                ->directory('settings')
                                                ->preserveFilenames()
                                                ->columnSpanFull()
                                                ->reorderable()
                                                ->required(),

                                        ])->columns(2),
                                    Section::make(__('vision Information'))
                                        ->description(__('This is the main information about the review.'))
                                        ->collapsible(true)

                                        ->schema([

                                            Textarea::make('vision_ar')
                                                ->label(__('Description (Arabic)'))
                                                ->autofocus()
                                                ->minLength(3)
                                                ->rows(6)

                                                ->required(),
                                            Textarea::make('vision_en')
                                                ->label(__('Description (English)'))
                                                ->autofocus()
                                                ->rows(6)

                                                ->minLength(3)
                                                ->required(),

                                        ])->columns(2),
                                    Section::make(__('message Information'))
                                        ->description(__('This is the main information about the review.'))
                                        ->collapsible(true)

                                        ->schema([

                                            Textarea::make('message_ar')
                                                ->label(__('Description (Arabic)'))
                                                ->autofocus()
                                                ->minLength(4)
                                                ->rows(6)

                                                ->required(),
                                            Textarea::make('message_en')
                                                ->label(__('Description (English)'))
                                                ->autofocus()
                                                ->rows(6)

                                                ->minLength(4)
                                                ->required(),
                                            FileUpload::make('message_image')
                                                ->label(__('message image'))
                                                ->image()
                                                ->disk('public')
                                                ->directory('settings')
                                                ->columnSpanFull()
                                                ->preserveFilenames()
                                                ->reorderable()
                                                ->required(),

                                        ])->columns(2),

                                    Section::make(__('value Information'))
                                        ->description(__('This is the main information about the review.'))
                                        ->collapsible(true)

                                        ->schema([

                                            RichEditor::make('value_desc_ar')
                                                ->label(__('Description (Arabic)'))
                                                ->autofocus()
                                                ->minLength(3)
                                                ->required(),
                                            RichEditor::make('value_desc_en')
                                                ->label(__('Description (English)'))
                                                ->autofocus()
                                                ->minLength(3)
                                                ->required(),
                                            FileUpload::make('value_image')
                                                ->label(__('value image'))
                                                ->image()
                                                ->disk('public')
                                                ->directory('settings')
                                                ->columnSpanFull()
                                                ->preserveFilenames()
                                                ->reorderable()
                                                ->required(),

                                        ])->columns(2),

                                ]),










                            ])->columns(2),


                    ]),
            ])->columns(1);
    }
}
