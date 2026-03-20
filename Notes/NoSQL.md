# Notes: What is NoSQL?

https://www.youtube.com/watch?v=7gwy-Dxofx8; last accessed: 20260320

> モンスターハンターワイルズ 100万以上のユーザー同時接続を支えたネットワークアーキテクチャ（CUS-52） 

> Amazon Web Services Japan 公式

> Mar 18, 2026

# Google Search: nosql

> AI Overview

> NoSQL (non-relational) databases are designed for high-performance, flexible data models, and horizontal scalability, making them ideal for massive volumes of unstructured or rapidly changing data.

> Common NoSQL Database Types

> Document Databases: Store data in documents (JSON, BSON, XML), such as MongoDB or CouchDB Coursera.

JSON

> Key-Value Stores: Simple dictionary structures, ideal for caching, such as Redis.

Key-Value

> Popular NoSQL Database Systems

> MongoDB (Document)
    
> DynamoDB (Key-Value)
    
> Cassandra (Wide Column)

# Google Search: DynamoDB

> AI Overview

> Amazon DynamoDB is a fully managed, serverless, NoSQL database service provided by
Amazon Web Services (AWS)...

> Key Concepts

> Tables, Items, and Attributes: Data is stored in tables, which contain items (rows), and items contain attributes (columns).
    
> Primary Keys: Uniquely identify each item, either via a Partition Key (hash key) or a Composite Primary Key (partition + sort key).

# Google Search: nosql to sql migration dynamodb

> AI Overview

> Migrating from a NoSQL database like
Amazon DynamoDB to a SQL (relational) database is a significant undertaking that requires careful planning, data modeling changes, and the use of specific migration tools. It is not a simple "lift-and-shift" process; it involves a shift in mindset from DynamoDB's access-pattern-driven design to a normalized SQL structure.

# Google Search: aws dynamodb tutorial

> AI Overview

> Core Concepts

> NoSQL Database: DynamoDB is a non-relational database, meaning it uses a flexible schema and does not require a traditional SQL structure.
    
> Tables, Items, and Attributes: Data is organized into tables (collections of items), where each item (row) has attributes (key-value pairs).
    
> Primary Key: Every item must be uniquely identified by a primary key, which can be a simple partition key or a composite key (partition key and sort key).

# Google Search: nosql no foreign keys?

> AI Overview

> NoSQL databases typically do not support or enforce foreign keys or joins across tables. Instead of enforcing relational integrity at the database level, NoSQL relies on application-level logic to maintain data relationships and uses embedding or referencing to handle data association, enhancing write performance and scalability.

no foreign keys 
