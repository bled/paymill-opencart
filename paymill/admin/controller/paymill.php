<?php

/**
 * paymill
 *
 * @category   PayIntelligent
 * @package    Expression package is undefined on line 6, column 18 in Templates/Scripting/PHPClass.php.
 * @copyright  Copyright (c) 2011 PayIntelligent GmbH (http://payintelligent.de)
 */
abstract class ControllerPaymentPaymill extends Controller
{

    abstract protected function getPaymentName();

    public function index()
    {
        global $config;
        $this->language->load('payment/' . $this->getPaymentName());
        $this->document->setTitle($this->language->get('heading_title'));

        if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
            $this->load->model('setting/setting');

            $newConfig[$this->getPaymentName() . '_status'] = $this->request->post['paymill_status'];
            $newConfig[$this->getPaymentName() . '_publickey'] = $this->request->post['paymill_publickey'];
            $newConfig[$this->getPaymentName() . '_privatekey'] = $this->request->post['paymill_privatekey'];
            $newConfig[$this->getPaymentName() . '_apiurl'] = $this->request->post['paymill_apiurl'];
            $newConfig[$this->getPaymentName() . '_bridgeurl'] = $this->request->post['paymill_bridgeurl'];
            $newConfig[$this->getPaymentName() . '_sort_order'] = $this->request->post['paymill_sort_order'];
            $newConfig[$this->getPaymentName() . '_logging'] = $this->request->post['paymill_logging'];
            $newConfig[$this->getPaymentName() . '_debugging'] = $this->request->post['paymill_debugging'];

            $this->model_setting_setting->editSetting($this->getPaymentName(), $newConfig);
            $this->session->data['success'] = $this->language->get('text_success');
            $this->redirect(HTTPS_SERVER . 'index.php?route=extension/payment&token=' . $this->session->data['token']);
        }

        $this->data['breadcrumbs'] = $this->getBreadcrumbs();
        $this->data['heading_title'] = $this->language->get('heading_title');

        $this->data['text_enabled'] = $this->language->get('text_enabled');
        $this->data['text_disabled'] = $this->language->get('text_disabled');
        $this->data['text_payment'] = $this->language->get('text_payment');
        $this->data['text_success'] = $this->language->get('text_success');
        $this->data['text_paymill'] = $this->language->get('text_paymill');
        $this->data['text_sale'] = $this->language->get('text_sale');

        $this->data['entry_status'] = $this->language->get('entry_status');
        $this->data['entry_publickey'] = $this->language->get('entry_publickey');
        $this->data['entry_privatekey'] = $this->language->get('entry_privatekey');
        $this->data['entry_apiurl'] = $this->language->get('entry_apiurl');
        $this->data['entry_bridgeurl'] = $this->language->get('entry_bridgeurl');
        $this->data['entry_sort_order'] = $this->language->get('entry_sort_order');
        $this->data['entry_logging'] = $this->language->get('entry_logging');
        $this->data['entry_debugging'] = $this->language->get('entry_debugging');

        $this->data['button_save'] = $this->language->get('button_save');
        $this->data['button_cancel'] = $this->language->get('button_cancel');

        $this->data['action'] = HTTPS_SERVER . 'index.php?route=payment/' . $this->getPaymentName() . '&token=' . $this->session->data['token'];
        $this->data['cancel'] = HTTPS_SERVER . 'index.php?route=extension/payment&token=' . $this->session->data['token'];

        $this->data['paymill_status'] = $this->getConfigValue($this->getPaymentName() . '_status');
        $this->data['paymill_publickey'] = $this->getConfigValue($this->getPaymentName() . '_publickey');
        $this->data['paymill_privatekey'] = $this->getConfigValue($this->getPaymentName() . '_privatekey');
        $this->data['paymill_apiurl'] = $this->getConfigValue($this->getPaymentName() . '_apiurl');
        $this->data['paymill_bridgeurl'] = $this->getConfigValue($this->getPaymentName() . '_bridgeurl');
        $this->data['paymill_sort_order'] = $this->getConfigValue($this->getPaymentName() . '_sort_order');
        $this->data['paymill_logging'] = $this->getConfigValue($this->getPaymentName() . '_logging');
        $this->data['paymill_debugging'] = $this->getConfigValue($this->getPaymentName() . '_debugging');

        $this->template = 'payment/' . $this->getPaymentName() . '.tpl';
        $this->children = array(
            'common/header',
            'common/footer'
        );
        $this->response->setOutput($this->render(true), $this->config->get('config_compression'));
    }

    protected function getBreadcrumbs()
    {
        $breadcrumbs = array();
        $breadcrumbs[] = array(
            'href' => HTTPS_SERVER . 'index.php?route=common/home&token=' . $this->session->data['token'],
            'text' => $this->language->get('text_home'),
            'separator' => FALSE
        );

        $breadcrumbs[] = array(
            'href' => HTTPS_SERVER . 'index.php?route=extension/payment&token=' . $this->session->data['token'],
            'text' => $this->language->get('text_payment'),
            'separator' => ' :: '
        );

        $breadcrumbs[] = array(
            'href' => HTTPS_SERVER . 'index.php?route=payment/' . $this->getPaymentName() . '&token=' . $this->session->data['token'],
            'text' => $this->language->get('heading_title'),
            'separator' => ' :: '
        );
        return $breadcrumbs;
    }

    protected function getConfigValue($configField)
    {
        if (isset($this->request->post[$configField])) {
            return $this->request->post[$configField];
        } else {
            return $this->config->get($configField);
        }
    }

    protected function validate()
    {

        if (!$this->user->hasPermission('modify', 'payment/' . $this->getPaymentName())) {
            $this->error['warning'] = $this->language->get('error_permission');
        }

        if (!$this->error) {
            return true;
        } else {
            return false;
        }
    }

    public function install()
    {
        $config[$this->getPaymentName() . '_status'] = '0';
        $config[$this->getPaymentName() . '_publickey'] = '';
        $config[$this->getPaymentName() . '_privatekey'] = '';
        $config[$this->getPaymentName() . '_apiurl'] = 'https://api.paymill.de/v2/';
        $config[$this->getPaymentName() . '_bridgeurl'] = 'https://bridge.paymill.de/';
        $config[$this->getPaymentName() . '_sort_order'] = '1';
        $config[$this->getPaymentName() . '_logging'] = '1';
        $config[$this->getPaymentName() . '_debugging'] = '1';

        $this->load->model('setting/setting');
        $this->model_setting_setting->editSetting($this->getPaymentName(), $config);
    }

    public function uninstall()
    {

    }

}