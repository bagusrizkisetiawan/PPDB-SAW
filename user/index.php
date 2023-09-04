<?php
include "autentikasi.php";
include "../koneksi.php";
include "control.php";

$id_user = $_SESSION['id_user'];

$user = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM user WHERE id_user='$id_user'"));

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>SMK Pangudi Luhur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../style.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">

</head>

<body class="bg-light">

    <div class="py-3  shadow-sm">
        <div class="container d-flex justify-content-between">

            <button type="button" class="btn btn-warning text-white" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample"><i class="bx bx-menu"></i></button>

            <div class="nav-item dropstart">
                <?php
                if ($user['foto'] == '') {
                ?>
                    <a class="nav-link img-profil ms-0" style="background-image: url('https://cdn-icons-png.flaticon.com/512/149/149071.png') ;" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    </a>
                <?php } elseif ($user['foto'] != '') {
                ?>
                    <a class="nav-link img-profil ms-0" style="background-image: url('../img/user/<?php echo $user['foto'] ?>') ;" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    </a>
                <?php
                }
                ?>
                <ul class="dropdown-menu">
                    <li class="p-3">
                        <?php echo $user['nama'] ?>
                        <small class=" text-secondary mb-0">
                            ( <?php echo $user['level'] ?> )
                        </small>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li class="pe-5"><a class="dropdown-item bg-white link-secondary pe-5 py-2" href="../"><i class="bx bx-exit"></i> Beranda</a></li>
                    <li class="pe-5"><a class="dropdown-item bg-white link-secondary pe-5 py-2" href="?page=profil"><i class='bx bx-user-circle'></i> Profil</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item bg-white link-secondary" href="logout.php"><i class="bx bx-log-out"></i> Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- offcanvas -->
    <div class="offcanvas offcanvas-start" style="width: 300px;" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title text-warning" id="offcanvasExampleLabel">SMK PALU</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="nav flex-column">
                <h6 class="text-secondary ps-3">Home</h6>
                <li class="nav-item">
                    <a class="nav-link link-secondary  <?php if (empty($page)) {
                                                            echo "active";
                                                        } ?>" href="./">
                        <i class="bx bx-home me-2"></i>
                        Dashboard
                    </a>
                </li>
                <br>
                <h6 class="text-secondary ps-3">Sekolah</h6>
                <?php
                if ($user['level'] == 'guru') {
                ?>
                    <li class="nav-item">
                        <a class="nav-link link-secondary <?php if ($page == 'pengumuman') {
                                                                echo "active";
                                                            } ?>" href="?page=pengumuman">
                            <i class="bx bx-chat me-2"></i>
                            Pengumuman
                        </a>
                    </li>
                <?php } ?>
                <li class="nav-item">
                    <a class="nav-link link-secondary <?php if ($page == 'artikel') {
                                                            echo "active";
                                                        } ?>" href="?page=artikel">
                        <i class="bx bx-book-open me-2"></i>
                        Artikel
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link-secondary <?php if ($page == 'komentar_artikel') {
                                                            echo "active";
                                                        } ?>" href="?page=komentar_artikel">
                        <i class="bx bx-edit-alt me-2"></i>
                        Komentar Artikel
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link-secondary <?php if ($page == 'komentar_pengumuman') {
                                                            echo "active";
                                                        } ?>" href="?page=komentar_pengumuman">
                        <i class="bx bx-edit-alt me-2"></i>
                        Komentar Pengumuman
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- end offcanvas -->

    <div class="container py-4">

        <?php
        if (!empty($page)) {
            include "page/$page.php";
        } else {

            include "page/dashboard.php";
        }
        ?>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
        $(document).ready(function() {
            $('#dataTable-2').DataTable();
        });
    </script>
    <script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/super-build/ckeditor.js"></script>
    <script>
        // This sample still does not showcase all CKEditor 5 features (!)
        // Visit https://ckeditor.com/docs/ckeditor5/latest/features/index.html to browse all the features.
        CKEDITOR.ClassicEditor.create(document.getElementById("editor"), {
            // https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format
            toolbar: {
                items: [
                    'exportPDF', 'exportWord', '|',
                    'findAndReplace', 'selectAll', '|',
                    'heading', '|',
                    'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript', 'removeFormat', '|',
                    'bulletedList', 'numberedList', 'todoList', '|',
                    'outdent', 'indent', '|',
                    'undo', 'redo',
                    '-',
                    'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                    'alignment', '|',
                    'link', 'insertImage', 'blockQuote', 'insertTable', 'mediaEmbed', 'codeBlock', 'htmlEmbed', '|',
                    'specialCharacters', 'horizontalLine', 'pageBreak', '|',
                    'textPartLanguage', '|',
                    'sourceEditing'
                ],
                shouldNotGroupWhenFull: true
            },
            // Changing the language of the interface requires loading the language file using the <script> tag.
            // language: 'es',
            list: {
                properties: {
                    styles: true,
                    startIndex: true,
                    reversed: true
                }
            },
            // https://ckeditor.com/docs/ckeditor5/latest/features/headings.html#configuration
            heading: {
                options: [{
                        model: 'paragraph',
                        title: 'Paragraph',
                        class: 'ck-heading_paragraph'
                    },
                    {
                        model: 'heading1',
                        view: 'h1',
                        title: 'Heading 1',
                        class: 'ck-heading_heading1'
                    },
                    {
                        model: 'heading2',
                        view: 'h2',
                        title: 'Heading 2',
                        class: 'ck-heading_heading2'
                    },
                    {
                        model: 'heading3',
                        view: 'h3',
                        title: 'Heading 3',
                        class: 'ck-heading_heading3'
                    },
                    {
                        model: 'heading4',
                        view: 'h4',
                        title: 'Heading 4',
                        class: 'ck-heading_heading4'
                    },
                    {
                        model: 'heading5',
                        view: 'h5',
                        title: 'Heading 5',
                        class: 'ck-heading_heading5'
                    },
                    {
                        model: 'heading6',
                        view: 'h6',
                        title: 'Heading 6',
                        class: 'ck-heading_heading6'
                    }
                ]
            },
            // https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
            placeholder: 'Tulis Keterangan....',
            // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-family-feature
            fontFamily: {
                options: [
                    'default',
                    'Arial, Helvetica, sans-serif',
                    'Courier New, Courier, monospace',
                    'Georgia, serif',
                    'Lucida Sans Unicode, Lucida Grande, sans-serif',
                    'Tahoma, Geneva, sans-serif',
                    'Times New Roman, Times, serif',
                    'Trebuchet MS, Helvetica, sans-serif',
                    'Verdana, Geneva, sans-serif'
                ],
                supportAllValues: true
            },
            // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-size-feature
            fontSize: {
                options: [10, 12, 14, 'default', 18, 20, 22],
                supportAllValues: true
            },
            // Be careful with the setting below. It instructs CKEditor to accept ALL HTML markup.
            // https://ckeditor.com/docs/ckeditor5/latest/features/general-html-support.html#enabling-all-html-features
            htmlSupport: {
                allow: [{
                    name: /.*/,
                    attributes: true,
                    classes: true,
                    styles: true
                }]
            },
            // Be careful with enabling previews
            // https://ckeditor.com/docs/ckeditor5/latest/features/html-embed.html#content-previews
            htmlEmbed: {
                showPreviews: true
            },
            // https://ckeditor.com/docs/ckeditor5/latest/features/link.html#custom-link-attributes-decorators
            link: {
                decorators: {
                    addTargetToExternalLinks: true,
                    defaultProtocol: 'https://',
                    toggleDownloadable: {
                        mode: 'manual',
                        label: 'Downloadable',
                        attributes: {
                            download: 'file'
                        }
                    }
                }
            },
            // https://ckeditor.com/docs/ckeditor5/latest/features/mentions.html#configuration
            mention: {
                feeds: [{
                    marker: '@',
                    feed: [
                        '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes', '@chocolate', '@cookie', '@cotton', '@cream',
                        '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread', '@gummi', '@ice', '@jelly-o',
                        '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding', '@sesame', '@snaps', '@soufflé',
                        '@sugar', '@sweet', '@topping', '@wafer'
                    ],
                    minimumCharacters: 1
                }]
            },
            // The "super-build" contains more premium features that require additional configuration, disable them below.
            // Do not turn them on unless you read the documentation and know how to configure them and setup the editor.
            removePlugins: [
                // These two are commercial, but you can try them out without registering to a trial.
                // 'ExportPdf',
                // 'ExportWord',
                'CKBox',
                'CKFinder',
                'EasyImage',
                // This sample uses the Base64UploadAdapter to handle image uploads as it requires no configuration.
                // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/base64-upload-adapter.html
                // Storing images as Base64 is usually a very bad idea.
                // Replace it on production website with other solutions:
                // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/image-upload.html
                // 'Base64UploadAdapter',
                'RealTimeCollaborativeComments',
                'RealTimeCollaborativeTrackChanges',
                'RealTimeCollaborativeRevisionHistory',
                'PresenceList',
                'Comments',
                'TrackChanges',
                'TrackChangesData',
                'RevisionHistory',
                'Pagination',
                'WProofreader',
                // Careful, with the Mathtype plugin CKEditor will not load when loading this sample
                // from a local file system (file://) - load this site via HTTP server if you enable MathType.
                'MathType',
                // The following features are part of the Productivity Pack and require additional license.
                'SlashCommand',
                'Template',
                'DocumentOutline',
                'FormatPainter',
                'TableOfContents'
            ]
        });
    </script>
</body>

</html>