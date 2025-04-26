<?php

namespace CFOOTMAD\Classes;

use CFOOTMAD\Utility\ProcResult;
use CFOOTMAD\Utility\StoredProcHandler;

class Price
{
    public function __construct() 
    {
    }

    public function AddPrice($post): ProcResult
    {
        $storedProcHandler = new StoredProcHandler();
        $inputParameters = $this->LoadFormValues($post);
        return $storedProcHandler->Add('spAddPrice', $inputParameters);
    }

    public function UpdatePrice($post): ProcResult
    {
        $storedProcHandler = new StoredProcHandler();
        $inputParameters = $this->LoadFormValues($post);
        return $storedProcHandler->Update('spUpdatePrice', $inputParameters);
    }

    public function DeletePrice($id): ProcResult
    {
        $storedProcHandler = new StoredProcHandler();
        $inputParameters = ["id" => $id];
        return $storedProcHandler->Delete('spDeletePrice', $inputParameters);
    }

    public function SelectPrice($id): ProcResult
    {
        $storedProcHandler = new StoredProcHandler();
        $inputParameters  = ["id" => $id];
        return $storedProcHandler->Select('spSelectPrice', $inputParameters);
    }

    public function SelectAllPrices(): ProcResult
    {
        $storedProcHandler = new StoredProcHandler();
        $inputParameters = [];
        return $storedProcHandler->SelectAll('spSelectAllPrice', $inputParameters);
    }

    private function LoadFormValues($post): Array
    {
        $inputParameters = [];
        $inputParameters['slidingLow'] = isset($post['slidingLow']) ? floatval($post['slidingLow']) : null;
        $inputParameters['slidingHigh'] = isset($post['slidingHigh']) ? floatval($post['slidingHigh']) : null;
        $inputParameters['isSlidingScale'] = isset($post['isSlidingScale']) ? filter_var($post['isSlidingScale'], FILTER_VALIDATE_BOOLEAN) : null;
        $inputParameters['nonMember'] = isset($post['nonMember']) ? floatval($post['nonMember']) : null;
        $inputParameters['member'] = isset($post['member']) ? floatval($post['member']) : null;
        $inputParameters['student'] = isset($post['student']) ? floatval($post['student']) : null;
        $inputParameters['freeAge'] = isset($post['freeAge']) ? intval($post['freeAge']) : null;
        $inputParameters['createdById'] = isset($post['createdById']) ? intval($post['createdById']) : null;
        $inputParameters['createdDate'] = date('Y-m-d H:i:s');
        $inputParameters['isSlidingScale'] = isset($post['isSlidingScale']) ? filter_var($post['isSlidingScale'], FILTER_VALIDATE_BOOLEAN) : null;
        return $inputParameters;
    }
}