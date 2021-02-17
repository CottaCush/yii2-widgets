<?php

namespace CottaCush\Yii2\Widgets;

use CottaCush\Yii2\Assets\DropzoneImageUploadAsset;
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
class DropzoneWidget extends BaseWidget
{
    public string|null $imageUrl = null;
    public string|null $uploadUrl;
    public string|null $imageName;
    public array $acceptedExtensions = ['.jpg', '.jpeg', '.png'];
    public int $maxFiles = 1;
    public int $maxFileSize = 2;
    public bool $addRemoveLinks = true;
    public string $previewTemplate;
    public string $targetUrlInputId;
    public string $urlKey = 'url';
    public string $errorMessageKey = 'message';
    public string $uploadPrompt = 'Click to add an image or drag image here';
    public string $removeImageLabel = 'Remove image';

    public function init()
    {
        DropzoneImageUploadAsset::register($this->view);

        parent::init();
    }

    public function run()
    {
        echo $this->beginDiv('clearfix');

        echo $this->beginDiv('dropzone-placeholder');

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

        echo $this->endDiv(); //.dropzone-placeholder
        echo $this->endDiv(); //.clearfix


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

    private function getDefaultPreviewTemplate(): string
    {
        $previewTemplate = $this->beginDiv('dz-preview dz-image-preview');
        $previewTemplate .= $this->beginDiv('dz-image');
        $previewTemplate .= Html::img('', ['data-dz-thumbnail' => '']);
        $previewTemplate .= $this->endDiv();
        $previewTemplate .=  $this->beginDiv('dz-error-message');
        $previewTemplate .= Html::tag('span', '', ['data-dz-errormessage' => '']);
        $previewTemplate .= $this->endDiv();
        $previewTemplate .= Html::tag(
            'span',
            '',
            ['id' => 'dropzone_upload_info', 'class' => 'text-center dropzone_upload_info']
        );
        $previewTemplate .= Html::tag('a', '', ['class' => 'dz-remove', 'data-dz-remove']);
        $previewTemplate .= $this->endDiv();
        return $previewTemplate;
    }
}
