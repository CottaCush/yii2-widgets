<?php

namespace CottaCush\Yii2\Widgets;

use CottaCush\Yii2\Assets\DropzoneImageUploadAsset;
use yii\base\Widget;
use yii\helpers\Html;

/**
 * The Dropzone widget is used to setup a image upload box that supports dragging.
 *
 *
 * A basic usage looks like the following:
 *
 * ```php
 * <?= DropzoneWidget::widget([
 *     'uploadUrl' => '/site/upload',
 *     'targetUrlInputId' => 'image_url_input'
 *     ],
 * ]) ?>
 * ```
 *
 * @author Adeyemi Olaoye <yemi@cottacush.com>
 */
class DropzoneWidget extends Widget
{
    public $imageUrl = null;
    public $uploadUrl;
    public $imageName;
    public $acceptedExtensions = ['.jpg', '.jpeg', '.png'];
    public $maxFiles = 1;
    public $maxFileSize = 2;
    public $addRemoveLinks = true;
    public $previewTemplate;
    public $targetUrlInputId;
    public $urlKey = 'url';
    public $errorMessageKey = 'message';
    public $uploadPrompt = 'Click to add an image or drag image here';
    public $removeImageLabel = 'Remove image';

    public function init()
    {
        DropzoneImageUploadAsset::register($this->view);

        parent::init();
    }

    public function run()
    {
        echo Html::beginTag('div', ['class' => 'clearfix']);

        echo Html::beginTag('div', ['class' => 'dropzone-placeholder']);

        $placeholderImage = Html::img($this->imageUrl, ['class' => 'img-responsive dropzone-placeholder__image']);
        $removeImageLabel = Html::a($this->removeImageLabel, '#', [
            'id' => 'remove_image_link', 'class' => 'dropzone-placeholder__remove-link'
        ]);

        echo Html::tag(
            'div',
            $placeholderImage . $removeImageLabel,
            ['class' => 'text-center hide']
        );

        echo Html::tag(
            'div',
            Html::tag('div', $this->uploadPrompt, ['class' => 'dz-message']),
            [
                'class' => 'dropzone dropzone-holder__dropzone-target dz-clickable hide',
                'id' => 'dropzone_media'
            ]
        );

        echo Html::endTag('div');


        echo Html::script('var dropzoneOptions =' . json_encode([
                'url' => $this->uploadUrl,
                'paramName' => $this->imageName,
                'maxFiles' => $this->maxFiles,
                'addRemoveLinks' => $this->addRemoveLinks,
                'acceptedFiles' => implode(', ', $this->acceptedExtensions),
                'maxFilesize' => $this->maxFileSize,
                'previewTemplate' => $this->previewTemplate ?: $this->getDefaultPreviewTemplate(),
                'urlInputId' => $this->targetUrlInputId
            ]));
    }

    private function getDefaultPreviewTemplate()
    {
        $previewTemplate = Html::beginTag('div', ['class' => 'dz-preview dz-image-preview']);
        $previewTemplate .= Html::beginTag('div', ['class' => 'dz-image']);
        $previewTemplate .= Html::img('', ['data-dz-thumbnail' => '']);
        $previewTemplate .= Html::endTag('div');
        $previewTemplate .= Html::beginTag('div', ['class' => 'dz-error-message']);
        $previewTemplate .= Html::tag('span', '', ['data-dz-errormessage' => '']);
        $previewTemplate .= Html::endTag('div');
        $previewTemplate .= Html::tag(
            'span',
            '',
            ['id' => 'dropzone_upload_info', 'class' => 'text-center dropzone_upload_info']
        );
        $previewTemplate .= Html::tag('a', '', ['class' => 'dz-remove', 'data-dz-remove']);
        $previewTemplate .= Html::endTag('div');
        return $previewTemplate;
    }
}