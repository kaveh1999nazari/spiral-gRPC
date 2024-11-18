<?php
return [

    /**
     * -------------------------------------------------------------------------
     *  Default Storage Bucket Name
     * -------------------------------------------------------------------------
     *
     * Here you can specify which of the buckets you want to use by default for
     * all work with storages.
     *
     */

    'default' => env('STORAGE_SERVER', 'uploads'),

    /**
     * -------------------------------------------------------------------------
     *  Storage Servers
     * -------------------------------------------------------------------------
     *
     * Here is each of the servers configured for your application. Of
     * course, the examples of customizing each available server supported by
     * Spiral are shown below to simplify development.
     *
     */

    'servers' => [
        'static' => [
            'adapter' => 'local',
            'directory' => __DIR__ . '/../../public/uploads',
        ],

        's3' => [
            'adapter' => 's3', // or "s3-async"
            'region' => env('S3_REGION'),
            'bucket' => env('S3_BUCKET'),
            'key' => env('S3_KEY'),
            'secret' => env('S3_SECRET'),
        ],
    ],

    /**
     * -------------------------------------------------------------------------
     *  Storage Buckets
     * -------------------------------------------------------------------------
     *
     * Here is a list of specific buckets (or storages) that use the
     * server settings above. Each "server" section in this list must refer to a
     * valid server name in the list above.
     *
     * The list of settings in this case is also an example of use. You can
     * freely change the number of buckets and the type of settings as you wish.
     *
     */

    'buckets' => [
        'uploads' => [
            'server' => 'static',
            'prefix' => 'upload',
        ],

        'images' => [
            'server' => 'static',
            'prefix' => 'img',
        ],

        'videos' => [
            'server' => 's3',
        ],
    ],
];
