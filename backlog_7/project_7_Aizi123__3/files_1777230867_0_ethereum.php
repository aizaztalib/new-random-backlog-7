<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Ethereum Network Configuration
    |--------------------------------------------------------------------------
    |
    | Configure which Ethereum network to use: 'sepolia', 'mainnet', or 'ganache'
    |
    */
    'network' => env('ETHEREUM_NETWORK', 'sepolia'),

    /*
    |--------------------------------------------------------------------------
    | RPC Provider URLs
    |--------------------------------------------------------------------------
    |
    | RPC endpoints for different networks. Configure your Infura/Alchemy URLs here.
    |
    */
    'rpc' => [
        'sepolia' => env('ETHEREUM_RPC_URL_SEPOLIA', 'https://sepolia.infura.io/v3/cb12bd06cc7f482fabf64b7b3c50db93'),
        'mainnet' => env('ETHEREUM_RPC_URL_MAINNET', 'https://mainnet.infura.io/v3/cb12bd06cc7f482fabf64b7b3c50db93'),
        'ganache' => env('ETHEREUM_RPC_URL_GANACHE', 'http://127.0.0.1:8545'),
        'timeout' => env('ETHEREUM_RPC_TIMEOUT', 15), // Timeout in seconds (reduced to fail faster)
    ],

    /*
    |--------------------------------------------------------------------------
    | Get RPC URL Based on Network
    |--------------------------------------------------------------------------
    | This will be determined dynamically in the service
    */

    /*
    |--------------------------------------------------------------------------
    | Network Chain IDs
    |--------------------------------------------------------------------------
    */
    'chain_ids' => [
        'sepolia' => 11155111,
        'mainnet' => 1,
        'ganache' => 5777,
    ],

    /*
    |--------------------------------------------------------------------------
    | Blockchain Explorers
    |--------------------------------------------------------------------------
    */
    'explorers' => [
        'sepolia' => 'https://sepolia.etherscan.io',
        'mainnet' => 'https://etherscan.io',
        'ganache' => null,
    ],

    /*
    |--------------------------------------------------------------------------
    | Smart Contract Configuration
    |--------------------------------------------------------------------------
    |
    | Contract address will be added after deployment
    |
    */
    'contract' => [
        'address' => env('ETHEREUM_CONTRACT_ADDRESS', ''),
        'abi_path' => storage_path('app/contracts/ERC20Token.json'),
    ],

    /*
    |--------------------------------------------------------------------------
    | System Wallet Configuration
    |--------------------------------------------------------------------------
    |
    | Wallet used for sending tokens to users
    | IMPORTANT: Never commit private keys to version control!
    |
    */
    'system_wallet' => [
        'address' => env('ETHEREUM_SYSTEM_WALLET_ADDRESS', ''),
        'private_key' => env('ETHEREUM_PRIVATE_KEY', ''),
    ],

    /*
    |--------------------------------------------------------------------------
    | Secure Storage Configuration
    |--------------------------------------------------------------------------
    |
    | Storage driver for sensitive data (private keys, etc.)
    | Options: 'env', 'file', 'vault', 'aws'
    |
    | - 'env': Environment variables (default, simple)
    | - 'file': Encrypted file storage (recommended for development)
    | - 'vault': HashiCorp Vault (recommended for production)
    | - 'aws': AWS Secrets Manager (cloud option)
    |
    */
    'storage' => [
        'driver' => env('ETHEREUM_STORAGE_DRIVER', 'env'),
        
        // File storage configuration
        'file' => [
            'path' => env('ETHEREUM_STORAGE_FILE_PATH', storage_path('app/secrets')),
        ],
        
        // HashiCorp Vault configuration
        'vault' => [
            'url' => env('VAULT_URL', 'http://127.0.0.1:8200'),
            'token' => env('VAULT_TOKEN', ''),
            'path' => env('VAULT_SECRET_PATH', 'secret/data/ethereum'),
        ],
        
        // AWS Secrets Manager configuration
        'aws' => [
            'region' => env('AWS_REGION', 'us-east-1'),
            'secret_name' => env('AWS_SECRET_NAME', 'ethereum/system-wallet'),
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Gas Configuration
    |--------------------------------------------------------------------------
    |
    | Gas settings for transactions
    |
    */
    'gas' => [
        'limit' => env('ETHEREUM_GAS_LIMIT', 100000),
        'price_gwei' => env('ETHEREUM_GAS_PRICE_GWEI', 20),
        'auto_price' => env('ETHEREUM_AUTO_GAS_PRICE', true),
        'max_price_gwei' => env('ETHEREUM_MAX_GAS_PRICE_GWEI', 2000000),
    ],

    /*
    |--------------------------------------------------------------------------
    | Transaction Settings
    |--------------------------------------------------------------------------
    */
    'transaction' => [
        'min_confirmations' => env('ETHEREUM_MIN_CONFIRMATIONS', 12),
        'timeout_seconds' => env('ETHEREUM_TIMEOUT', 300),
        'retry_attempts' => env('ETHEREUM_RETRY_ATTEMPTS', 3),
        'retry_delay_seconds' => env('ETHEREUM_RETRY_DELAY', 60),
    ],

    /*
    |--------------------------------------------------------------------------
    | Feature Flags
    |--------------------------------------------------------------------------
    */
    'enabled' => env('ETHEREUM_ENABLED', false),
    'auto_distribute' => env('ETHEREUM_AUTO_DISTRIBUTE', true),
    'required_confirmations' => env('ETHEREUM_REQUIRED_CONFIRMATIONS', 12),

];
