<!doctype html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Simple Transactional Email</title>
    <style>
      /* -------------------------------------
          GLOBAL RESETS
      ------------------------------------- */
      
      /*All the styling goes here*/
      
      img {
        border: none;
        -ms-interpolation-mode: bicubic;
        max-width: 100%; 
      }

      body {
        background-color: #f6f6f6;
        -webkit-font-smoothing: antialiased;
        font-size: 14px;
        line-height: 1.4;
        margin: 0;
        padding: 0;
        -ms-text-size-adjust: 100%;
        -webkit-text-size-adjust: 100%; 
      }

      table {
        border-collapse: separate;
        mso-table-lspace: 0pt;
        mso-table-rspace: 0pt;
        width: 100%; }
        table td {
          font-size: 14px;
          vertical-align: top; 
      }

      /* -------------------------------------
          CUSTOM FONT FAMILY
      ------------------------------------- */

      @media screen {
        /* devanagari */
        @font-face {
          font-family: 'Poppins';
          font-style: normal;
          font-weight: 400;
          font-display: swap;
          src: url(https://fonts.gstatic.com/s/poppins/v15/pxiEyp8kv8JHgFVrJJbecmNE.woff2) format('woff2');
          unicode-range: U+0900-097F, U+1CD0-1CF6, U+1CF8-1CF9, U+200C-200D, U+20A8, U+20B9, U+25CC, U+A830-A839, U+A8E0-A8FB;
        }
        /* latin-ext */
        @font-face {
          font-family: 'Poppins';
          font-style: normal;
          font-weight: 400;
          font-display: swap;
          src: url(https://fonts.gstatic.com/s/poppins/v15/pxiEyp8kv8JHgFVrJJnecmNE.woff2) format('woff2');
          unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
        }
        /* latin */
        @font-face {
          font-family: 'Poppins';
          font-style: normal;
          font-weight: 400;
          font-display: swap;
          src: url(https://fonts.gstatic.com/s/poppins/v15/pxiEyp8kv8JHgFVrJJfecg.woff2) format('woff2');
          unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }
        /* devanagari */
        @font-face {
          font-family: 'Poppins';
          font-style: normal;
          font-weight: 500;
          font-display: swap;
          src: url(https://fonts.gstatic.com/s/poppins/v15/pxiByp8kv8JHgFVrLGT9Z11lFc-K.woff2) format('woff2');
          unicode-range: U+0900-097F, U+1CD0-1CF6, U+1CF8-1CF9, U+200C-200D, U+20A8, U+20B9, U+25CC, U+A830-A839, U+A8E0-A8FB;
        }
        /* latin-ext */
        @font-face {
          font-family: 'Poppins';
          font-style: normal;
          font-weight: 500;
          font-display: swap;
          src: url(https://fonts.gstatic.com/s/poppins/v15/pxiByp8kv8JHgFVrLGT9Z1JlFc-K.woff2) format('woff2');
          unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
        }
        /* latin */
        @font-face {
          font-family: 'Poppins';
          font-style: normal;
          font-weight: 500;
          font-display: swap;
          src: url(https://fonts.gstatic.com/s/poppins/v15/pxiByp8kv8JHgFVrLGT9Z1xlFQ.woff2) format('woff2');
          unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }
        /* devanagari */
        @font-face {
          font-family: 'Poppins';
          font-style: normal;
          font-weight: 600;
          font-display: swap;
          src: url(https://fonts.gstatic.com/s/poppins/v15/pxiByp8kv8JHgFVrLEj6Z11lFc-K.woff2) format('woff2');
          unicode-range: U+0900-097F, U+1CD0-1CF6, U+1CF8-1CF9, U+200C-200D, U+20A8, U+20B9, U+25CC, U+A830-A839, U+A8E0-A8FB;
        }
        /* latin-ext */
        @font-face {
          font-family: 'Poppins';
          font-style: normal;
          font-weight: 600;
          font-display: swap;
          src: url(https://fonts.gstatic.com/s/poppins/v15/pxiByp8kv8JHgFVrLEj6Z1JlFc-K.woff2) format('woff2');
          unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
        }
        /* latin */
        @font-face {
          font-family: 'Poppins';
          font-style: normal;
          font-weight: 600;
          font-display: swap;
          src: url(https://fonts.gstatic.com/s/poppins/v15/pxiByp8kv8JHgFVrLEj6Z1xlFQ.woff2) format('woff2');
          unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }
        /* devanagari */
        @font-face {
          font-family: 'Poppins';
          font-style: normal;
          font-weight: 700;
          font-display: swap;
          src: url(https://fonts.gstatic.com/s/poppins/v15/pxiByp8kv8JHgFVrLCz7Z11lFc-K.woff2) format('woff2');
          unicode-range: U+0900-097F, U+1CD0-1CF6, U+1CF8-1CF9, U+200C-200D, U+20A8, U+20B9, U+25CC, U+A830-A839, U+A8E0-A8FB;
        }
        /* latin-ext */
        @font-face {
          font-family: 'Poppins';
          font-style: normal;
          font-weight: 700;
          font-display: swap;
          src: url(https://fonts.gstatic.com/s/poppins/v15/pxiByp8kv8JHgFVrLCz7Z1JlFc-K.woff2) format('woff2');
          unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
        }
        /* latin */
        @font-face {
          font-family: 'Poppins';
          font-style: normal;
          font-weight: 700;
          font-display: swap;
          src: url(https://fonts.gstatic.com/s/poppins/v15/pxiByp8kv8JHgFVrLCz7Z1xlFQ.woff2) format('woff2');
          unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }
      }

      /* -------------------------------------
          BODY & CONTAINER
      ------------------------------------- */

      .body {
        font-family: "Poppins", "Lucida Grande", "Lucida Sans Unicode", Tahoma, Sans-Serif;
        background-color: #f6f6f6;
        width: 100%; 
      }

      /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
      .container {
        display: block;
        margin: 0 auto !important;
        /* makes it centered */
        max-width: 580px;
        padding: 10px;
        width: 580px; 
      }

      /* This should also be a block element, so that it will fill 100% of the .container */
      .content {
        box-sizing: border-box;
        display: block;
        margin: 0 auto;
        max-width: 580px;
        padding: 10px; 
      }

      /* -------------------------------------
          HEADER, FOOTER, MAIN
      ------------------------------------- */
      .main {
        border-radius: 3px;
        width: 100%; 
      }

      .wrapper {
        box-sizing: border-box;
        padding: 20px; 
      }

      .content-block {
        padding-bottom: 10px;
        padding-top: 10px;
      }

      .footer {
        clear: both;
        margin-top: 10px;
        text-align: center;
        width: 100%; 
      }
        .footer td,
        .footer p,
        .footer span,
        .footer a {
          color: #999999;
          font-size: 12px;
          text-align: center; 
      }

      /* -------------------------------------
          TYPOGRAPHY
      ------------------------------------- */
      h1,
      h2,
      h3,
      h4,
      h5,
      h6 {
        color: #000000;
        font-weight: 400;
        line-height: 1.4;
        margin: 0;
        margin-bottom: 30px; 
      }

      h1 {
        font-size: 35px;
        font-weight: 300;
        text-align: center;
        text-transform: capitalize; 
      }

      p,
      ul,
      ol {
        font-size: 14px;
        font-weight: normal;
        margin: 0;
        margin-bottom: 15px; 
      }
        p li,
        ul li,
        ol li {
          list-style-position: inside;
          margin-left: 5px; 
      }

      a {
        color: #3498db;
        text-decoration: underline; 
      }

      /* -------------------------------------
          BUTTONS
      ------------------------------------- */
      .btn {
        box-sizing: border-box;
        width: 100%; }
        .btn > tbody > tr > td {
          padding-bottom: 15px; }
        .btn table {
          width: auto; 
      }
        .btn table td {
          background-color: #ffffff;
          border-radius: 16px;
          text-align: center; 
      }
        .btn a {
          background-color: #ffffff;
          border: solid 1px #3B89A1;
          border-radius: 16px;
          box-sizing: border-box;
          color: #3B89A1;
          cursor: pointer;
          display: inline-block;
          font-size: 14px;
          font-weight: bold;
          margin: 0;
          padding: 12px 25px;
          text-decoration: none;
          text-transform: capitalize; 
      }

      .btn-primary table td {
        background-color: #3B89A1; 
      }

      .btn-primary a {
        background-color: #3B89A1;
        border-color: #3B89A1;
        color: #ffffff; 
        width: 100%;

        transition: all 300ms ease-in-out;
      }

      /* -------------------------------------
          OTHER STYLES THAT MIGHT BE USEFUL
      ------------------------------------- */
      .last {
        margin-bottom: 0; 
      }

      .first {
        margin-top: 0; 
      }

      .align-center {
        text-align: center; 
      }

      .align-right {
        text-align: right; 
      }

      .align-left {
        text-align: left; 
      }

      .clear {
        clear: both; 
      }

      .mt0 {
        margin-top: 0; 
      }

      .mb0 {
        margin-bottom: 0; 
      }

      .preheader {
        color: transparent;
        display: none;
        height: 0;
        max-height: 0;
        max-width: 0;
        opacity: 0;
        overflow: hidden;
        mso-hide: all;
        visibility: hidden;
        width: 0; 
      }

      .powered-by a {
        text-decoration: none; 
      }

      hr {
        border: 0;
        border-bottom: 1px solid #f6f6f6;
        margin: 20px 0; 
      }

      /* -------------------------------------
          RESPONSIVE AND MOBILE FRIENDLY STYLES
      ------------------------------------- */
      @media only screen and (max-width: 620px) {
        table.body h1 {
          font-size: 28px !important;
          margin-bottom: 10px !important; 
        }
        table.body p,
        table.body ul,
        table.body ol,
        table.body td,
        table.body span,
        table.body a {
          font-size: 16px !important; 
        }
        table.body .wrapper,
        table.body .article {
          padding: 10px !important; 
        }
        table.body .content {
          padding: 0 !important; 
        }
        table.body .container {
          padding: 0 !important;
          width: 100% !important; 
        }
        table.body .main {
          border-left-width: 0 !important;
          border-radius: 0 !important;
          border-right-width: 0 !important; 
        }
        table.body .btn table {
          width: 100% !important; 
        }
        table.body .btn a {
          width: 100% !important; 
        }
        table.body .img-responsive {
          height: auto !important;
          max-width: 100% !important;
          width: auto !important; 
        }
      }

      /* -------------------------------------
          PRESERVE THESE STYLES IN THE HEAD
      ------------------------------------- */
      @media all {
        .ExternalClass {
          width: 100%; 
        }
        .ExternalClass,
        .ExternalClass p,
        .ExternalClass span,
        .ExternalClass font,
        .ExternalClass td,
        .ExternalClass div {
          line-height: 100%; 
        }
        .apple-link a {
          color: inherit !important;
          font-family: inherit !important;
          font-size: inherit !important;
          font-weight: inherit !important;
          line-height: inherit !important;
          text-decoration: none !important; 
        }
        #MessageViewBody a {
          color: inherit;
          text-decoration: none;
          font-size: inherit;
          font-family: inherit;
          font-weight: inherit;
          line-height: inherit;
        }
        .btn-primary table td:hover {
          background-color: #184158 !important; 
        }
        .btn-primary a:hover {
          background-color: #184158 !important;
          border-color: #184158 !important; 
        } 
      }

    </style>
  </head>
  <body class="">
    <span class="preheader">This is preheader text. Some clients will show this text as a preview.</span>
    <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="body">
      <tr>
        <td>&nbsp;</td>
        <td class="container">
          <div class="content">

            <!-- START CENTERED WHITE CONTAINER -->
            <table role="presentation" class="main">

              <!-- START MAIN CONTENT AREA -->
              <tr style="background: #F7F7FC; border-bottom: 2px solid #D9DBE9;">
                <td align="center">
                  <img src="https://www.dislub.com.ar/wp-content/uploads/2018/10/logo-menu-1.jpg" height="48" alt="Dislub" style="margin: 16px 0;">
                </td>
              </tr>
              
              <tr style="background: #fff;">
                <td class="wrapper">
                  <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td>
                        <h1 style="color: #3B89A1; font-size: 24px; font-weight: 700; margin: 0 0 24px 0;">¡Cotización enviada con éxito!</h1>
                        <p style="color: #14142B; font-size: 14px; font-weight: 500; margin: 0; line-height: 24px; letter-spacing: 0.75px;">Nuestro equipo revisará tu solicitud y te contactará lo antes posible. A continuación te compartimos el detalle de la cotización:</p>

                        <div style="height: 2px; background: #D9DBE9; margin: 17px 0;"></div>
                        
                        <label style="color: #14142B; font-weight: 500; font-size: 14px; margin: 0 0 4px 0; letter-spacing: 0.75px;">ID:</label>
                        <p style="color: #14142B; font-weight: 600; margin: 0 0 18px 0; letter-spacing: 0.75px;">{{ $order['id'] }}</p>

                        <label style="color: #14142B; font-weight: 500; font-size: 14px; margin: 0 0 4px 0; letter-spacing: 0.75px;">Empresa:</label>
                        <p style="color: #14142B; font-weight: 600; margin: 0 0 18px 0; letter-spacing: 0.75px;">{{ $order['name'] }}</p>

                        <label style="color: #14142B; font-weight: 500; font-size: 14px; margin: 0 0 4px 0; letter-spacing: 0.75px;">Email:</label>
                        <p style="color: #14142B; font-weight: 600; margin: 0 0 18px 0; letter-spacing: 0.75px;">{{ $order['email'] }}</p>
                        
                        <label style="color: #14142B; font-weight: 500; font-size: 14px; margin: 0 0 4px 0; letter-spacing: 0.75px;">Fecha de cotización:</label>
                        <p style="color: #14142B; font-weight: 600; margin: 0 0 18px 0; letter-spacing: 0.75px;">{{ $order['created_at'] }}</p>
                        
                        <label style="color: #14142B; font-weight: 500; font-size: 14px; margin: 0 0 4px 0; letter-spacing: 0.75px;">Total productos:</label>
                        <p style="color: #14142B; font-weight: 600; margin: 0 0 18px 0; letter-spacing: 0.75px;">{{ $order['total_products'] }}</p>

                        <label style="color: #14142B; font-weight: 500; font-size: 14px; margin: 0 0 4px 0; letter-spacing: 0.75px;">Comentarios:</label>
                        @if($order['comments'])
                          <p style="color: #14142B; font-weight: 600; margin: 0 0 18px 0; letter-spacing: 0.75px;">{{ $order['comments'] }}</p>
                        @else
                          <p style="color: #14142B; font-weight: 600; margin: 0 0 18px 0; letter-spacing: 0.75px;">-</p>
                        @endif

                        <div style="height: 2px; background: #D9DBE9; margin: 0 0 17px 0;"></div>

                        <h1 style="color: #3B89A1; font-size: 24px; font-weight: 700; margin: 0 0 24px 0;">Detalles de la cotización:</h1>

                        <label style="color: #14142B; font-weight: 500; font-size: 14px; margin: 0 0 18px 0; letter-spacing: 0.75px; display: block;">Productos:</label>

                        @foreach ($order['products'] as $product)
                          <table style="border: 2px solid #EFF0F7; border-radius: 16px; padding: 12px; margin: 0 0 18px 0;">
                            <tr>
                              <td>
                                <img src="https://www.dislub.com.ar/wp-content/uploads/2018/10/12644709025af204365a1835.jpg" alt="" height="48" width="48">
                              </td>
                            
                              <td>
                                <span style="color: #14142B; font-weight: 600; margin: 0 0 2px 0; line-height: 28px;">
                                  {{ $product['name'] }}	
                                </span>

                                <span style="color: #6E7191; font-weight: 500; font-size: 14px; display: block;">2 Litros, 40W</span>
                              </td>

                              <td style="text-align: center;">
                                <span style="color: #6E7191; font-weight: 500; font-size: 14px; line-height: 24px;">Cantidad:</span>
                                <span style="color: #3B89A1; font-size: 18px; display: block; font-weight: 600;">
                                  {{ $product['quantity'] }}
                                </span>
                              </td>
                            </tr>
                          </table>
                        @endforeach

                      </td>
                    </tr>
                  </table>
                </td>
              </tr>

            <!-- END MAIN CONTENT AREA -->
            </table>
            <!-- END CENTERED WHITE CONTAINER -->

            <!-- START FOOTER -->
            <div class="footer">
              <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td class="content-block">
                    <span class="apple-link">Dislub, Ciudad de Buenos Aires, Argentina</span>
                    <br> Todos los derechos reservados - 2021.
                  </td>
                </tr>
                <tr>
                  <td class="content-block powered-by">
                    Powered by <a href="http://app.dislub.com.ar" target="_blank">Dislub</a>.
                  </td>
                </tr>
              </table>
            </div>
            <!-- END FOOTER -->

          </div>
        </td>
        <td>&nbsp;</td>
      </tr>
    </table>
  </body>
</html>